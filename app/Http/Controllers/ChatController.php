<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $userMessage = $request->input('message');
        
        // Baca file konteks RAG
        $context = '';
        if (Storage::exists('class_context.txt')) {
            $context = Storage::get('class_context.txt');
        }

        // Siapkan Prompt RAG
        $systemPrompt = "Anda adalah AI Assistant yang ramah untuk kelas X RPL D. Jawablah pertanyaan HANYA berdasarkan konteks berikut. Jika jawaban tidak ada di dalam konteks, katakan dengan sopan bahwa Anda tidak tahu. Jawab dengan bahasa Indonesia yang natural.\n\nKonteks Kelas:\n" . $context;

        $apiKey = env('LLM_API_KEY');
        
        if (empty($apiKey) || $apiKey === 'YOUR_API_KEY_HERE') {
            return response()->json([
                'reply' => 'Maaf, API Key LLM belum dikonfigurasi di server. Silakan beritahu admin.'
            ]);
        }

        try {
            // Kita gunakan format API standar (kompatibel dengan OpenAI, Groq, OpenRouter, dll)
            // Untuk default, anggap menggunakan OpenAI API.
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo', // Bisa diganti sesuai kebutuhan LLM
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userMessage]
                ],
                'max_tokens' => 150,
                'temperature' => 0.7
            ]);

            if ($response->successful()) {
                $reply = $response->json('choices.0.message.content');
                return response()->json(['reply' => $reply]);
            } else {
                Log::error('LLM API Error: ' . $response->body());
                return response()->json(['reply' => 'Maaf, terjadi kesalahan saat menghubungi server AI.'], 500);
            }

        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());
            return response()->json(['reply' => 'Maaf, sistem AI sedang offline atau mengalami gangguan.'], 500);
        }
    }
}
