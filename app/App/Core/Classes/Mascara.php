<?php

namespace Crud\App\Core\Classes;

use Illuminate\Support\Str;

class Mascara
{

    public function __construct()
    {
        //debugbar()->addMessage('Mascara Facade');
    }

    public function debug()
    {
        //debugbar()->addMessage('Mascara Facade');
        return 'Mascara Facade';
    }

    public static function dataHora(
        string|null $valor,
        string $tipo = 'br',
        bool   $dataAbreviada = false,
        bool   $horaAbreviada = true,
        bool   $hora = false,
    ) : string
    {

        $tipo = strtolower(str_replace('_','',$tipo));

        $tipoAno     = ($dataAbreviada === true) ? 'y' : 'Y';
        $tipoHorario = ($horaAbreviada === true) ? '' : ':s';

        $valorNovo = match ($tipo){
            'en','banco','bd','mysql','ingles'  => date_format(date_create($valor), $tipoAno . '-m-d'),
            'br','portugues','html','pagina'    => date_format(date_create($valor),'d/m/' . $tipoAno),
        };

        if($hora === true)
            $valorNovo .= ' ' .  date_format(date_create($valor),'H:m' . $tipoHorario);

        return $valorNovo;
    }

    public static function dataBd(
        string|null $valor
    ) : string|null
    {
        if($valor)
            $valor = \DateTime::createFromFormat('d/m/Y', $valor)->format('Y-m-d');
        return $valor;
    }


    public static function moeda(
        $valor,
        string $tipo = 'br',
        string $sigla = null,
    )
    {
        $valor = number_format($valor,2,',','.');
        $sigla = $sigla.' ';
        return $sigla . $valor;
    }


    public static function moedaBd(
        string|null $valor
    ): float|null
    {
        if($valor){
            $valor = str_replace('.','',$valor);
            $valor = str_replace(
                ['R$ ',','],
                ['','.'],
                $valor);
        }

        return $valor;
    }


    public static function percentual(
        $valor,
    )
    {
        return $valor . '%';
    }


    public static function getSlug(string $nome, string $modelName): string
    {

        $model = 'Crud\\Models\\' . $modelName;

        $cancela = false;
        $i = 0;
        while ($cancela <> true){

            $complemento = ($i>0) ? '-' . $i : '';
            $conta = count($model::where('slug','=',Str::slug($nome) . $complemento )->get());

            if($conta==0){
                $cancela = true;
                $slug = Str::slug($nome) . $complemento;
            }
            $i++;
        }

        return $slug;
    }

    public static function simNao(int|null $valor) : string
    {
        $opcao[0] = 'Não';
        $opcao[1] = 'Sim';

        return ($valor) ?: $opcao[$valor];
    }
}

