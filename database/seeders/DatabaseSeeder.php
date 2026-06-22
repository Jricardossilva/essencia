<?php
namespace Database\Seeders;
use App\Models\{Post, Testimonial};
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@essencia.com.br'], [
            'name' => 'Danielle',
            'password' => Hash::make('essencia2026'),
        ]);

        if (Testimonial::count() === 0) {
            Testimonial::insert([
                ['autor'=>'Paciente · Saúde da mulher','estrelas'=>5,'texto'=>'Me senti acolhida em cada etapa. O cuidado fez diferença na minha recuperação pós-parto.','publicado'=>1,'ordem'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['autor'=>'Familiar de paciente','estrelas'=>5,'texto'=>'Minha mãe voltou a andar com confiança. O atendimento domiciliar foi um presente.','publicado'=>1,'ordem'=>2,'created_at'=>now(),'updated_at'=>now()],
                ['autor'=>'Paciente · Fisioterapia pélvica','estrelas'=>5,'texto'=>'Profissional dedicada e técnica. Recuperei minha qualidade de vida.','publicado'=>1,'ordem'=>3,'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
        if (Post::count() === 0) {
            Post::insert([
                ['titulo'=>'Sexualidade no pós-parto: o que é normal e quando buscar ajuda','slug'=>'sexualidade-pos-parto','categoria'=>'Saúde da mulher','resumo'=>'Dor, ressecamento e queda da libido são comuns — e podem ser cuidados.','conteudo'=>"O pós-parto é uma fase de adaptação física e emocional. Dor durante a relação, ressecamento vaginal e diminuição da libido são frequentes e, na maioria dos casos, temporários.\n\nA fisioterapia pélvica ajuda a recuperar a musculatura do assoalho pélvico, reduzir dores e orientar o retorno seguro à atividade sexual, sempre respeitando o tempo de cada mulher.",'publicado'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['titulo'=>'5 dicas para prevenir quedas em casa','slug'=>'prevenir-quedas-em-casa','categoria'=>'Saúde do idoso','resumo'=>'Ajustes simples no ambiente que aumentam a segurança e a autonomia.','conteudo'=>"Quedas em casa são comuns e, na maioria das vezes, evitáveis. Retire tapetes soltos, garanta boa iluminação, instale barras de apoio no banheiro e mantenha os caminhos livres.\n\nCalçados firmes e exercícios de equilíbrio completam a prevenção. A fisioterapia geriátrica avalia o risco e monta um plano individualizado.",'publicado'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['titulo'=>'Fisioterapia pélvica masculina: quando procurar','slug'=>'fisioterapia-pelvica-masculina','categoria'=>'Saúde do homem','resumo'=>'Incontinência e recuperação pós-prostatectomia têm tratamento.','conteudo'=>"A fisioterapia pélvica masculina trata incontinência urinária, dor pélvica e disfunções sexuais, além de auxiliar na recuperação após a cirurgia de próstata.\n\nO fortalecimento do assoalho pélvico devolve controle, confiança e qualidade de vida.",'publicado'=>1,'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
    }
}
