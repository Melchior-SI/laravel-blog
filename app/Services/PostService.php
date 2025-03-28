<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }


            $data['preview_image'] = Storage::disk("public")->put("/images", $data['preview_image']);
            $data['banner_image'] = Storage::disk("public")->put("/images", $data['banner_image']);


            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            abort(500);
        }
    }

    public function update($data, $post) {
        try {
            DB::beginTransaction();
            if (isset($data['preview_image'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk("public")->put("/images", $data['preview_image']);
            }
            if (isset($data['banner_image'])) {
                $data['banner_image'] = Storage::disk("public")->put("/images", $data['banner_image']);
            }
            dd($data);
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            abort(404);
        }
        return $post;
    }
}
