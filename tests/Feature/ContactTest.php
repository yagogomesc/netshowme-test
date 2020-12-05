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
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem nome.
     *
     * @return void
     */
    public function testSendContactWithoutName()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem nome e email.
     *
     * @return void
     */
    public function testSendContactWithoutNameAndEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => '',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem nome, email e telefone.
     *
     * @return void
     */
    public function testSendContactWithoutNameEmailAndPhone()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => '',
            'phone' => '',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem nome, email, telefone e mensagem.
     *
     * @return void
     */
    public function testSendContactWithoutNameEmailPhoneAndMessage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => '',
            'phone' => '',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem e-mail.
     *
     * @return void
     */
    public function testSendContactWithoutEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => '',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com e-mail incorreto.
     *
     * @return void
     */
    public function testSendContactWrongEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    
    /**
     * Teste de envio do formulário de contato sem nome e email incorreto.
     *
     * @return void
     */
    public function testSendContactWithoutNameAndWrongEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => 'test.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem nome e email incorreto.
     *
     * @return void
     */
    public function testSendContactWithoutNamePhoneAndWrongEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => 'test.com',
            'phone' => '',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem e-mail e telefone.
     *
     * @return void
     */
    public function testSendContactWithoutEmailAndPhone()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => '',
            'phone' => '',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem e-mail e mensage.
     *
     * @return void
     */
    public function testSendContactWithoutEmailAndMessage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => '',
            'phone' => '(99) 99999-9999',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem e-mail, telefone e mensagem.
     *
     * @return void
     */
    public function testSendContactWithoutEmailPhoneAndMessage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => '',
            'phone' => '',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem e-mail, telefone, mensagem e arquivo.
     *
     * @return void
     */
    public function testSendContactWithoutEmailPhoneMessageAndArchive()
    {
        $this->post('/', [
            'name' => 'Yago',
            'email' => '',
            'phone' => '',
            'message' => '',
            'archive' => '',
        ])->assertSessionHasErrors();
    }

    /**
     * Teste de envio do formulário de contato sem telefone.
     *
     * @return void
     */
    public function testSendContactWithoutPhone()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com telefone errado.
     *
     * @return void
     */
    public function testSendContactWrongPhone()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 999999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com telefone no padrão errado.
     *
     * @return void
     */
    public function testSendContactWrongPatternPhone()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 999-99999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem telefone e mensagem.
     *
     * @return void
     */
    public function testSendContactWithoutPhoneAndMessage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem telefone, mensagem e arquivo.
     *
     * @return void
     */
    public function testSendContactWithoutPhoneMessageAndArchive()
    {
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '',
            'message' => '',
            'archive' => '',
        ])->assertSessionHasErrors();
    }

    /**
     * Teste de envio do formulário de contato sem mensagem.
     *
     * @return void
     */
    public function testSendContactWithoutMessage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem mensagem e nome.
     *
     * @return void
     */
    public function testSendContactWithoutMessageAndName()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem mensagem, nome e email.
     *
     * @return void
     */
    public function testSendContactWithoutMessageNameAndEmail()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 400);
        
        $this->post('/', [
            'name' => '',
            'email' => '',
            'phone' => '(99) 99999-9999',
            'message' => '',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem mensagem e arquivo.
     *
     * @return void
     */
    public function testSendContactWithoutMessageAndArchive()
    {
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => '',
            'archive' => '',
        ])->assertSessionHasErrors();
    }

    /**
     * Teste de envio do formulário de contato com doc.
     *
     * @return void
     */
    public function testSendContactWithDoc()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.doc', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com docx.
     *
     * @return void
     */
    public function testSendContactWithDocx()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.docx', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com odt.
     *
     * @return void
     */
    public function testSendContactWithOdt()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.odt', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com txt.
     *
     * @return void
     */
    public function testSendContactWithTxt()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.txt', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com pdf grande.
     *
     * @return void
     */
    public function testSendContactWithBigPdf()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.pdf', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com doc grande.
     *
     * @return void
     */
    public function testSendContactWithBigDoc()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.doc', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com docx grande.
     *
     * @return void
     */
    public function testSendContactWithBigDocx()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.docx', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com odt grande.
     *
     * @return void
     */
    public function testSendContactWithBigOdt()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.odt', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com txt grande.
     *
     * @return void
     */
    public function testSendContactWithBigTxt()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.txt', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com uma imagem.
     *
     * @return void
     */
    public function testSendContactWithImage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.jpg', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com uma imagem grande.
     *
     * @return void
     */
    public function testSendContactWithBigImage()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.jpg', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com uma planilha.
     *
     * @return void
     */
    public function testSendContactWithExcel()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.xls', 400);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato com uma planilha grande.
     *
     * @return void
     */
    public function testSendContactWithBigExcel()
    {
        Storage::fake('local');
        $documentoTest = UploadedFile::fake()->create('docTest.xls', 4000);
        
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => $documentoTest,
        ])->assertSessionHasErrors();

        Storage::disk('local')->assertMissing("contacts/archives/{$documentoTest->name}");
    }

    /**
     * Teste de envio do formulário de contato sem arquivo.
     *
     * @return void
     */
    public function testSendContactWithoutArchive()
    {
        $this->post('/', [
            'name' => 'Yago',
            'email' => 'test@gmail.com',
            'phone' => '(99) 99999-9999',
            'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'archive' => '',
        ])->assertSessionHasErrors();
    }

    /**
     * Teste de envio do formulário de contato vazio.
     *
     * @return void
     */
    public function testSendContactEmpty()
    {
        $this->post('/', [
            'name' => '',
            'email' => '',
            'phone' => '',
            'message' => '',
            'archive' => '',
        ])->assertSessionHasErrors();
    }
}
