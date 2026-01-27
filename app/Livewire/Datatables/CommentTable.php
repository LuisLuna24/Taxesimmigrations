<?php

namespace App\Livewire\Datatables;

use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Comment;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CommentTable extends DataTableComponent
{
    protected $model = Comment::class;

    public function configure(): void
    {
        $this->setLoadingPlaceholderStatus(true);

        $this->setPrimaryKey('id')
            ->setQueryStringEnabled();

        $this->setConfigurableAreas([
            'after-wrapper' => [
                'admin.modal',
            ]
        ]);
    }

    public function filters(): array
    {
        return [
            DateRangeFilter::make('Fecha')
                ->config([
                    'allowInput' => true,
                    'altFormat'  => 'd/m/Y',
                    'dateFormat' => 'Y-m-d',
                ])
                ->filter(function ($query, array $dateRange) {
                    $query->whereDate('created_at', '>=', $dateRange['minDate'])
                        ->whereDate('created_at', '<=', $dateRange['maxDate']);
                }),

            SelectFilter::make('Estatus')
                ->options([
                    ''  => 'Todos',
                    '0' => 'Sin validar',
                    '1' => 'Validada',
                    '2' => 'No validada',
                ])
                ->filter(function ($query, string $value) {
                    if ($value !== '') {
                        $query->where('status', $value);
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Correo", "email")
                ->searchable()
                ->sortable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Estatus", "status")
                ->format(function ($value) {
                    $color = match ((int)$value) {
                        1 => 'bg-green-100 text-green-800',
                        2 => 'bg-red-100 text-red-800',
                        default => 'bg-gray-100 text-gray-800',
                    };

                    $text = match ((int)$value) {
                        1 => 'Validada',
                        2 => 'No validada',
                        default => 'Sin validar',
                    };

                    return '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ' . $color . '">' . $text . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(fn($value) => $value->format('Y-m-d')),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.actions', ['comment' => $row]);
                })
        ];
    }

    public $openModal = false;
    public $commentBody; // Para mostrar el texto en el textarea
    public $selectedCommentId; // Para saber qué ID estamos editando

    public function validateCommet($id)
    {
        $comment = Comment::findOrFail($id);

        $this->selectedCommentId = $id;
        $this->commentBody = $comment->comment; // Asumiendo que el campo se llama 'body'
        $this->openModal = true;
    }

    public function approve()
    {
        $comment = Comment::findOrFail($this->selectedCommentId);
        $comment->update(['status' => 1]); // 1 = Validada

        $this->reset(['openModal', 'selectedCommentId', 'commentBody']);

        // Si usas WireUI, puedes disparar una notificación
        $this->dispatch('swal', [
            'icon' => 'susses',
            'title' => 'Exito',
            'text' => 'Comentario aprobado correctamente',
        ]);
    }

    public function reject()
    {
        $comment = Comment::findOrFail($this->selectedCommentId);
        $comment->update(['status' => 2]); // 2 = No validada

        $this->reset(['openModal', 'selectedCommentId', 'commentBody']);
        $this->dispatch('swal', [
            'icon' => 'susses',
            'title' => 'Exito',
            'text' => 'Comentario rechazado',
        ]);
    }

    public function closeModal()
    {
        $this->reset(['openModal', 'selectedCommentId', 'commentBody']);
    }

    #[On('deleteComment')]
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            $this->dispatch('swal', [
                'icon' => 'susses',
                'title' => 'Exito',
                'text' => 'Comentario eliminado',
            ]);
        }
    }
}
