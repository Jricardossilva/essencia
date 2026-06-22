<?php
namespace App\Services;

class AvaliacaoService
{
    /** Risco de queda — respostas Sim(1)/Não(0) */
    public function queda(array $r): array
    {
        $s = array_sum($r);
        if ($s <= 1) return ['pontuacao'=>$s,'classificacao'=>'Baixo risco de queda','texto'=>'Os fatores indicam baixo risco no momento. Mantenha atividade física e ambientes seguros.','cls'=>'baixo'];
        if ($s === 2) return ['pontuacao'=>$s,'classificacao'=>'Risco moderado','texto'=>'Alguns fatores aumentam o risco. Uma avaliação pode orientar exercícios de equilíbrio e força.','cls'=>'mod'];
        return ['pontuacao'=>$s,'classificacao'=>'Alto risco de queda','texto'=>'Os fatores sugerem risco elevado. Recomenda-se avaliação especializada e plano individualizado.','cls'=>'alto'];
    }

    /** Impacto do ciclo — 10 respostas de 0 a 4 (máx 40) */
    public function ciclo(array $r): array
    {
        $s = array_sum($r);
        $alerta = collect([0,3,4,5])->contains(fn($i) => (int)($r[$i] ?? 0) >= 3);
        [$cls, $rotulo, $txt] = match (true) {
            $s <= 8  => ['baixo','🌿 Baixo impacto','Seus sintomas exercem pouco impacto na qualidade de vida. Continue observando seu ciclo.'],
            $s <= 16 => ['baixo','🌸 Impacto leve','Alguns sintomas podem influenciar seu bem-estar. O acompanhamento profissional pode orientar.'],
            $s <= 24 => ['mod','💛 Impacto moderado','O ciclo pode estar interferindo nas atividades diárias. Uma avaliação em saúde pélvica pode ajudar.'],
            $s <= 32 => ['alto','❤️ Impacto importante','Os sintomas sugerem impacto significativo. Uma avaliação especializada pode identificar causas.'],
            default  => ['alto','🚩 Alto impacto','Sintomas indicam importante comprometimento. Procure avaliação profissional.'],
        };
        return ['pontuacao'=>$s,'classificacao'=>$rotulo,'texto'=>$txt,'cls'=>$cls,'alerta'=>$alerta,'max'=>40];
    }
}
