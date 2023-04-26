<?php declare(strict_types=1);

use App\Aula;
use PHPUnit\Framework\TestCase;

final class AulaTest extends TestCase
{
    public function testExtrairDadosDaAula(): void {
        $aula = new Aula();

        $data = $aula->extrairInformacoes();
        $this->assertSame("{velocidade: 2}", $data);
    }
    // public function testCannotBeCreatedFromInvalidEmail(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);

    //     Email::fromString('invalid');
    // }
}



