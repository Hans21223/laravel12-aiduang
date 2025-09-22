<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear old data
        DB::table('news')->truncate();

        DB::table('news')->insert([
            // 1. Metal Gear Solid Delta
            [
                'title' => 'รีวิวเกม Metal Gear Solid Delta: Snake Eater - ลุงงูร่างอัปเกรดใหม่ภายนอกไฉไล ข้างในคนเดิม',
                'content' => "Metal Gear Solid Delta: Snake Eater เป็นเกมรีเมคที่คงความคลาสสิกของเกมเพลย์ต้นฉบับไว้...",
                'image_url' => 'https://media.online-station.net/images/2025/08/dca8705d4df8fa8008acc5f45a133665.jpg',
                'source_url' => 'https://www.online-station.net/pc-console-game/992268',
                'published_at' => Carbon::now()->subDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'มีผู้เล่น Helldivers II บางคน สามารถทำภารกิจปราบกองทัพ Illuminate ที่รุกรานดาว Calypso ได้สำเร็จภายใน 3 วัน',
                'content' => "เหล่า Helldivers ได้รวมพลังกันจนสามารถทำภารกิจ Major Order ในการปราบปรามกองทัพ Illuminate บนดาว Calypso...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2024/12/helldivers-2-1-1536x864.jpg',
                'source_url' => 'https://www.gamingdose.com/news/%E0%B8%A1%E0%B8%B5%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B9%80%E0%B8%A5%E0%B9%88%E0%B8%99-helldivers-ii-%E0%B8%9A%E0%B8%B2%E0%B8%87%E0%B8%84%E0%B8%99-%E0%B8%AA%E0%B8%B2%E0%B8%A1%E0%B8%B2%E0%B8%A3%E0%B8%96/',
                'published_at' => Carbon::now()->subDays(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'วิธีเล่นโหมด Overdrive โหมดเกมใหม่ล่าสุดใน Call of Duty: Black Ops 6',
                'content' => "โหมด Overdrive เป็นโหมดเกมใหม่ล่าสุดใน Call of Duty: Black Ops 6...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2025/01/Overdrive-BO6-Textless.jpg',
                'source_url' => 'https://www.gamingdose.com/feature/how-to-play-overdrive-mode-in-call-of-duty-black-ops-6/',
                'published_at' => Carbon::now()->subDays(3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ยอดขาย Final Fantasy VII Rebirth น่าพอใจ แต่การเป็นเกม Exclusive อาจไม่เพียงพอแล้ว',
                'content' => "Square Enix ยืนยันว่ายอดขายของ Final Fantasy VII Rebirth เป็นที่น่าพอใจ...",
                'image_url' => 'https://media.online-station.net/images/2024/12/0d246058bd9cde4b589609c2ff6dcae3.webp',
                'source_url' => 'https://www.online-station.net/pc-console-game/912743',
                'published_at' => Carbon::now()->subDays(4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'จากเรื่องแซวสู่เรื่องจริง ‘เชฟป้อม’ คอลแลบฯ กับ Valorant ในโอกาสพิเศษครบรอบ 5 ปี',
                'content' => "Riot Games เซอร์ไพรส์ผู้เล่น Valorant ด้วยการร่วมมือกับ 'เชฟป้อม' เพื่อฉลองครบรอบ 5 ปีของเกม...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2025/06/Chef-Pom-Valorant-1536x864.jpeg',
                'source_url' => 'https://www.gamingdose.com/news/%e0%b8%88%e0%b8%b2%e0%b8%81%e0%b9%80%e0%b8%a3%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%87%e0%b9%81%e0%b8%8b%e0%b8%a7%e0%b8%aa%e0%b8%b9%E0%b9%88%e0%b9%80%E0%b8%a3%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%87%e0%b8%88/',
                'published_at' => Carbon::now()->subDays(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'มากันต่อเนื่องกับ Genshin ตัวละครใหม่ Flins ธาตุไฟฟ้า “ประทีปลวงเร้นเงา”',
                'content' => "HoYoverse เปิดตัว Flins ตัวละครใหม่ล่าสุดจาก Genshin Impact...",
                'image_url' => 'https://fastcdn.hoyoverse.com/content-v2/plat/124031/5d2ba4371115d26de4c574b28311aed8_3908500551050520494.jpeg',
                'source_url' => 'https://www.gamingdose.com/news/%e0%b8%a1%e0%b8%b2%e0%b8%81%e0%b8%b1%e0%b8%99%e0%b8%95%e0%b9%88%e0%b8%ad%e0%b9%80%e0%b8%99%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%87%e0%b8%81%e0%b8%b1%e0%b8%9a-genshin-%e0%b8%95%e0%b8%b1%e0%b8%a7%e0%b8%a5/',
                'published_at' => Carbon::now()->subDays(6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'รวมทุกอย่างที่ควรรู้ ก่อนออกลุย Elden Ring: Shadow of the Erdtree',
                'content' => "Elden Ring: Shadow of the Erdtree คือส่วนเสริมขนาดใหญ่ที่แฟนๆ รอคอย...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2024/06/Elden-Ring-Shadow-of-the-Erdtree-02-1-1024x569.webp',
                'source_url' => 'https://www.gamingdose.com/feature/elden-ring-shadow-of-the-erdtree/',
                'published_at' => Carbon::now()->subDays(7),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ผู้เล่นเตือนภัยมิจฉาชีพ ส่งอีเมลหลอกให้ทดสอบ GTA VI ที่กำลังระบาดหนักตอนนี้',
                'content' => "ระวัง! ขณะนี้มีอีเมลปลอมอ้างว่าให้ผู้เล่นเข้าร่วมทดสอบเกม GTA VI...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2025/08/gta-iv-000-1536x864.jpg',
                'source_url' => 'https://www.gamingdose.com/news/%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B9%80%E0%B8%A5%E0%B9%88%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B8%A1%E0%B8%B4%E0%B8%88%E0%B8%89%E0%B8%B2%E0%B8%8A%E0%B8%B5/',
                'published_at' => Carbon::now()->subDays(8),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Umamusume: Pretty Derby เกมสาวม้า กับการเปิดตัวยิ่งใหญ่ต่อสายตาชาวโลก',
                'content' => "Umamusume: Pretty Derby เกมที่ผสมผสานการฝึกฝนตัวละครสาวม้าเข้ากับการแข่งม้า...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2025/07/Web1-1536x802.jpg',
                'source_url' => 'https://www.gamingdose.com/feature/umamusume-pretty-derby-%E0%B9%80%E0%B8%81%E0%B8%A1%E0%B8%AA%E0%B8%B2%E0%B8%A7%E0%B8%A1%E0%B9%89%E0%B8%B2-%E0%B8%81%E0%B8%B1%E0%B8%9A%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94/',
                'published_at' => Carbon::now()->subDays(9),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ยืนยันแล้ว ! Super Robot Wars Y เตรียมวางขายในวันที่ 28 ส.ค. นี้ ทั้งบน PC และคอนโซล',
                'content' => "แฟนๆ Super Robot Wars เตรียมตัวให้พร้อม! Bandai Namco ประกาศอย่างเป็นทางการ...",
                'image_url' => 'https://www.gamingdose.com/wp-content/uploads/2025/04/Super-Robot-Wars-Y-1536x864.jpeg',
                'source_url' => 'https://www.gamingdose.com/news/%E0%B8%A2%E0%B8%B7%E0%B8%99%E0%B8%A2%E0%B8%B1%E0%B8%99%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%A7-super-robot-wars-y-%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%A7%E0%B8%B2%E0%B8%87/',
                'published_at' => Carbon::now()->subDays(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
