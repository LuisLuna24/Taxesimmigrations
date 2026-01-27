<?php

namespace App\Livewire\Comments;

use App\Mail\CommentCreateMail;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormComments extends Component
{
    public $name;
    public $email;
    public $comment;
    public $rating = 5;
    public $successMessage = false;

    public $captcha_token;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'comment' => 'required|min:10',
            'captcha_token' => ['required', function ($attribute, $value, $fail) {

                // Usamos la variable de entorno directa o el config correcto
                $secret = env('NOCAPTCHA_SECRET');

                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret'   => $secret,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                $data = $response->json();

                // Verificación de éxito y score (v3)
                if (!$data['success']) {
                    $fail('La validación de reCAPTCHA falló. Inténtalo de nuevo.');
                    return;
                }

                if (isset($data['score']) && $data['score'] < 0.5) {
                    $fail('Google ha detectado actividad inusual (Bot).');
                }
            }],
        ], [
            'captcha_token.required' => 'La validación de seguridad es obligatoria.',
        ]);

        DB::beginTransaction();
        try {
            Comment::create([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
                'status' => 0,
                'ip_address' => request()->ip(),
            ]);

            DB::commit();

            // Limpiamos los campos
            $this->reset(['name', 'email', 'comment', 'captcha_token']);

            $this->successMessage = true;
            session()->flash('success', '¡Gracias por tu reseña!');

            // Mail::to('info@blueoceanaccountax.com')->send(new CommentCreateMail);

        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage()); // Útil para debug
            $this->addError('comment', 'Ocurrió un error al guardar. Inténtalo más tarde.');
        }
    }

    public function render()
    {
        return view('livewire.comments.form-comments');
    }
}
