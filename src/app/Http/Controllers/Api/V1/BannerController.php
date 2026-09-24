<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;

class BannerController extends Controller
{
    // GET /api/v1/banners
    public function index(): JsonResponse
    {
        $banners = Banner::select(
            'id_banner',
            'nome_banner',
            'titulo_banner',
            'subtitulo_banner',
            'descricao_banner',
            'texto_botao_banner',
            'link_botao_banner',
            'ordem_banner',
            'foto_banner',
            'status_banner'
        )
            ->where('status_banner', 'ATIVO')
            ->orderBy('ordem_banner')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $banners,
        ]);
    }
}
