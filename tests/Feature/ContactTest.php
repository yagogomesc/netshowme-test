<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * Teste de envio do formulário de contato.
     *
     * @return void
     */
    public function testSendContact()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'yago@gmail.com',
            'phone' => '(22) 99970-0516',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }
}
