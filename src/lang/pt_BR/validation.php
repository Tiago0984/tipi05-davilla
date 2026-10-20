<?php

// Mensagens de validação da API (o middleware ApiEmPortugues ativa o pt_BR)

return [

    'accepted'       => 'O campo :attribute deve ser aceito.',
    'array'          => 'O campo :attribute deve ser uma lista.',
    'boolean'        => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'      => 'A confirmação do campo :attribute não confere.',
    'date'           => 'O campo :attribute deve ser uma data válida.',
    'date_format'    => 'O campo :attribute deve estar no formato :format.',
    'different'      => 'Os campos :attribute e :other devem ser diferentes.',
    'email'          => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'exists'         => 'O valor selecionado em :attribute é inválido.',
    'in'             => 'O valor selecionado em :attribute é inválido.',
    'integer'        => 'O campo :attribute deve ser um número inteiro.',
    'numeric'        => 'O campo :attribute deve ser um número.',
    'required'       => 'O campo :attribute é obrigatório.',
    'string'         => 'O campo :attribute deve ser um texto.',
    'unique'         => 'O valor informado em :attribute já está em uso.',

    'max' => [
        'array'   => 'O campo :attribute não pode ter mais de :max itens.',
        'file'    => 'O campo :attribute não pode ter mais de :max kilobytes.',
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'string'  => 'O campo :attribute não pode ter mais de :max caracteres.',
    ],

    'min' => [
        'array'   => 'O campo :attribute deve ter pelo menos :min itens.',
        'file'    => 'O campo :attribute deve ter pelo menos :min kilobytes.',
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],

    'size' => [
        'array'   => 'O campo :attribute deve ter :size itens.',
        'file'    => 'O campo :attribute deve ter :size kilobytes.',
        'numeric' => 'O campo :attribute deve ser :size.',
        'string'  => 'O campo :attribute deve ter :size caracteres.',
    ],

    'custom' => [],

    // Nomes dos campos exibidos nas mensagens
    'attributes' => [
        'nome'                    => 'nome',
        'email'                   => 'e-mail',
        'telefone'                => 'telefone',
        'senha'                   => 'senha',
        'aceite_termo'            => 'aceite do termo',
        'device_name'             => 'nome do dispositivo',
        'nome_cliente'            => 'nome',
        'tipo_cliente'            => 'tipo de cliente',
        'cpf_cnpj_cliente'        => 'CPF/CNPJ',
        'data_nasc_cliente'       => 'data de nascimento',
        'email_cliente'           => 'e-mail',
        'telefone_cliente'        => 'telefone',
        'senha_atual'             => 'senha atual',
        'nova_senha'              => 'nova senha',
        'nova_senha_confirmation' => 'confirmação da nova senha',
    ],

];
