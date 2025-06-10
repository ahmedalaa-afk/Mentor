<?php

namespace App\Console\Commands;

use App\Models\Announcement;
use Illuminate\Console\Command;

class DeleteExpiredAnnouncement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'announcements:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired announcements';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredCount = Announcement::where('end_at', '<', now())
            ->where('status', 'active')
            ->delete();

        $this->info("Successfully deleted {$expiredCount} expired announcements.");
    }
}
