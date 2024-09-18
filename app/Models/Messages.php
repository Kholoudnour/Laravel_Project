<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Http;
class Messages extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
     'sender_name',
      'body', 
      'is_read', 
    ];
    protected $apiKey;
    protected $inboxId;

    public function __construct()
    {
        $this->apiKey = env('MAILTRAP_API_KEY');
        $this->inboxId = env('MAILTRAP_INBOX_ID');
    }

    public function fetchEmails()
    {
        $response = Http::withHeaders([
            'Api-Token' => $this->apiKey,
        ])->get("https://mailtrap.io/api/v1/inboxes/{$this->inboxId}/messages");

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}
