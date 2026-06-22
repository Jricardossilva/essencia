<?php
return [
    'whatsapp'     => env('WHATSAPP_NUMBER', '5583988874271'),
    'whatsapp_fmt' => '(83) 98887-4271',
    'email'        => 'danielleferreiradesantana@gmail.com',
    'cidade'       => 'João Pessoa – PB',
    'crefito'      => 'CREFITO 318169F',

    'cores' => ['verde'=>'#475538','salvia'=>'#7F8A6A','folha'=>'#929B7C','dourado'=>'#B8945A'],

    // Cartões de área exibidos na home (e base do menu "Atendimento")
    'areas' => [
        'saude-da-mulher'       => ['cor'=>'#7F8A6A','nome'=>'Saúde da Mulher','resumo'=>'Fisioterapia pélvica, gestação, pós-parto e sexualidade feminina.','icone'=>'flor'],
        'saude-do-homem'        => ['cor'=>'#5A694B','nome'=>'Saúde do Homem','resumo'=>'Fisioterapia pélvica masculina e qualidade de vida.','icone'=>'homem'],
        'saude-do-idoso'        => ['cor'=>'#929B7C','nome'=>'Saúde do Idoso','resumo'=>'Equilíbrio, prevenção de quedas e independência.','icone'=>'idoso'],
        'atendimento-domiciliar'=> ['cor'=>'#B8945A','nome'=>'Atendimento Domiciliar','resumo'=>'Cuidado humanizado no conforto da sua casa.','icone'=>'casa'],
        'praticas-integrativas' => ['cor'=>'#6E7B4F','nome'=>'Práticas Integrativas','resumo'=>'Auriculoterapia, relaxamento e bem-estar.','icone'=>'folha'],
        'cuidados-paliativos'   => ['cor'=>'#8A6E3A','nome'=>'Cuidados Paliativos','resumo'=>'Conforto, funcionalidade e dignidade.','icone'=>'coracao'],
    ],

    // Páginas de tópico (slug = caminho completo). Renderizadas por um template único.
    'topicos' => [
        'saude-da-mulher/fisioterapia-pelvica' => [
            'cor'=>'#7F8A6A','grupo'=>'Saúde da Mulher','eyebrow'=>'Saúde da Mulher','titulo'=>'Fisioterapia Pélvica Feminina',
            'intro'=>'Avaliação e tratamento de disfunções do assoalho pélvico que afetam a qualidade de vida da mulher.',
            'lista_titulo'=>'Atendemos','lista'=>['Incontinência urinária','Incontinência fecal','Bexiga hiperativa','Dor pélvica crônica','Vaginismo','Dispareunia (dor durante a relação sexual)','Prolapso genital'],
            'beneficios'=>['Mais segurança e confiança','Redução dos sintomas','Melhora da qualidade de vida','Recuperação da função sexual'],
        ],
        'saude-da-mulher/gestacao' => [
            'cor'=>'#7F8A6A','grupo'=>'Saúde da Mulher','eyebrow'=>'Saúde da Mulher','titulo'=>'Gestação',
            'intro'=>'Acompanhamento fisioterapêutico para promover uma gestação mais saudável e confortável.',
            'lista_titulo'=>'Auxiliamos em','lista'=>['Dores lombares e pélvicas','Preparação para o parto','Exercícios para gestantes','Fortalecimento do assoalho pélvico','Orientação postural e respiratória'],
            'beneficios'=>['Mais conforto na gestação','Preparo para o parto','Prevenção de dores','Bem-estar físico e emocional'],
        ],
        'saude-da-mulher/pos-parto' => [
            'cor'=>'#7F8A6A','grupo'=>'Saúde da Mulher','eyebrow'=>'Saúde da Mulher','titulo'=>'Pós-Parto',
            'intro'=>'Uma recuperação pós-parto mais segura, respeitando o tempo e as necessidades de cada mulher.',
            'lista_titulo'=>'Auxiliamos em','lista'=>['Recuperação após parto normal ou cesariana','Fortalecimento do assoalho pélvico','Recuperação da diástase abdominal','Retorno seguro à atividade física e sexual','Cuidado com a autoestima e o bem-estar'],
            'beneficios'=>['Recuperação mais segura','Redução de dores e desconfortos','Retorno gradual às atividades','Mais qualidade de vida'],
        ],
        'saude-do-homem' => [
            'cor'=>'#5A694B','grupo'=>'Saúde do Homem','eyebrow'=>'Saúde do Homem','titulo'=>'Fisioterapia Pélvica Masculina',
            'intro'=>'Tratamento das disfunções que afetam a saúde íntima e a qualidade de vida masculina.',
            'lista_titulo'=>'Atendemos','lista'=>['Incontinência urinária','Dor pélvica','Recuperação pós-prostatectomia','Disfunções sexuais','Fortalecimento do assoalho pélvico'],
            'beneficios'=>['Mais controle e confiança','Redução dos sintomas','Recuperação da função sexual','Melhora da qualidade de vida'],
        ],
        'saude-do-idoso' => [
            'cor'=>'#929B7C','grupo'=>'Saúde do Idoso','eyebrow'=>'Saúde do Idoso','titulo'=>'Fisioterapia Geriátrica',
            'intro'=>'Promovendo independência, funcionalidade e qualidade de vida em todas as fases do envelhecimento.',
            'lista_titulo'=>'Tratamentos para','lista'=>['Alterações de equilíbrio','Risco de quedas','Fraqueza muscular','Limitações funcionais','Doenças neurológicas','Reabilitação pós-internação'],
            'beneficios'=>['Mais autonomia e segurança','Prevenção de quedas','Manutenção da funcionalidade','Qualidade de vida'],
        ],
        'atendimento-domiciliar' => [
            'cor'=>'#B8945A','grupo'=>'Atendimento Domiciliar','eyebrow'=>'Atendimento Domiciliar','titulo'=>'Levamos o cuidado até você',
            'intro'=>'Atendimento humanizado e individualizado no conforto da sua casa, sem que você precise se deslocar.',
            'lista_titulo'=>'Ideal para','lista'=>['Idosos','Pacientes acamados','Pós-operatórios','Cuidados paliativos','Pessoas com dificuldade de locomoção'],
            'beneficios'=>['Comodidade e segurança','Cuidado individualizado','Ambiente familiar e acolhedor','Acompanhamento contínuo'],
        ],
        'praticas-integrativas' => [
            'cor'=>'#6E7B4F','grupo'=>'Práticas Integrativas','eyebrow'=>'Práticas Integrativas e Complementares','titulo'=>'Práticas Integrativas e Complementares',
            'intro'=>'Abordagens terapêuticas voltadas ao equilíbrio físico e emocional, complementando o tratamento.',
            'lista_titulo'=>'Podem incluir','lista'=>['Técnicas de relaxamento','Auriculoterapia','Cuidados integrativos','Promoção do bem-estar'],
            'beneficios'=>[],
        ],
        'cuidados-paliativos' => [
            'cor'=>'#8A6E3A','grupo'=>'Cuidados Paliativos','eyebrow'=>'Cuidados Paliativos','titulo'=>'Cuidados Paliativos',
            'intro'=>'Assistência fisioterapêutica humanizada para promover conforto, funcionalidade e qualidade de vida em momentos delicados.',
            'lista_titulo'=>'Cuidamos de','lista'=>['Conforto e alívio de sintomas','Manutenção da funcionalidade possível','Apoio à mobilidade e ao posicionamento','Acolhimento ao paciente e à família'],
            'beneficios'=>[],
        ],
    ],

    'diferenciais' => [
        'Atendimento humanizado','Avaliação individualizada','Tratamento baseado em evidências científicas',
        'Atendimento domiciliar','Especialização em saúde da mulher e do homem',
        'Mestranda em Funcionalidade Humana pela UFPB','Experiência em fisioterapia pélvica, geriatria e cuidados paliativos',
    ],
];
