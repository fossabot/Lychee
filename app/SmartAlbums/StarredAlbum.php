<?php

namespace App\SmartAlbums;

use App\Models\Configs;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Builder;

class StarredAlbum extends SmartAlbum
{
	public function get_title()
	{
		return 'starred';
	}

	public function get_photos(): Builder
	{
		// php7.4: return Photo::stars()->where(fn ($q) => $this->filter($q));
		return Photo::stars()->where(function ($q) {
			return $this->filter($q);
		});
	}

	public function is_public()
	{
		return Configs::get_value('public_starred', '0') === '1';
	}
}
