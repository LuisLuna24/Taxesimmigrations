<?php

namespace App\Livewire\Comments;

use App\Mail\CommentCreateMail;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;

class FormComments extends Component
{
    public $name;
    public $email;
    public $comment;

    // (Opcional) Propiedad para mensajes de éxito en la vista
    public $successMessage = false;

    #[On('save')]
    public function save($captchaToken)
    {
        //dd($captchaToken);
        $validator = Validator::make(
            array_merge(
                $this->all(),
                ['captchaToken' => $captchaToken]
            ),
            [
                'name'    => 'required|min:3|max:50',
                'email'   => 'required|email',
                'comment' => 'required|min:10',
                'captchaToken' => ['required', function ($attribute, $value, $fail) {

                    $secret = config('services.recaptcha.secret_key');

                    if (!$secret) {
                        dd('Error de configuración del servidor (Captcha Key).');
                        return;
                    }

                    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret'   => $secret,
                        'response' => $value,
                        'remoteip' => request()->ip(),
                    ]);

                    $data = $response->json();

                    if (!($data['success'] ?? false)) {
                        dd('La validación de seguridad falló.');
                        return;
                    }

                    if (isset($data['score']) && $data['score'] < 0.5) {
                        dd('Google detectó actividad sospechosa.');

                    }
                }],
            ],
            [
                'captchaToken.required' => 'La validación de seguridad es obligatoria.',
                'comment.min' => 'El comentario es muy corto.'
            ]
        );

        // Si falla, lanza la excepción y muestra errores en la vista automáticamente
        $validator->validate();

        DB::beginTransaction();
        try {
            Comment::create([
                'name'       => $this->name,
                'email'      => $this->email,
                'comment'    => $this->comment,
                'status'     => 0,
                'user_id'    => Auth::user()->id ?? null,
                'ip_address' => request()->ip(),
            ]);

            DB::commit();

            // CORRECCIÓN 3: Resetear solo lo que existe. El token no es propiedad, no se resetea.
            $this->reset(['name', 'email', 'comment']);

            $this->successMessage = true;
            session()->flash('success', '¡Gracias por tu reseña!');

            // Mail::to('...')->send(...);

        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            dd($e->getMessage());
            // Usamos addError para mostrar el error en el campo 'comment' o uno general
            $this->addError('comment', 'Error al guardar. Inténtalo más tarde.');
        }
    }

    public function render()
    {
        return view('livewire.comments.form-comments');
    }
}
