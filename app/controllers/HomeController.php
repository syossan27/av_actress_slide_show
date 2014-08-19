<?php

class HomeController extends BaseController {

	public function index()
	{

		// Twitter検索結果取得
		$search_result = Twitter::getSearch(['q' => '#AV女優自画撮り部 -RT -from:masaeav104 -from:sexyladyangirls -from:sexy_jidoribu -from:neko2cat exclude:retweets',
											'result_type' => 'recent', 
											'count' => '100', 
											'include_entities' => 'true']);

		$urls = [];

		// 検索結果から画像を抽出
		// 女優の画像アップロード先がTwitter公式のため、公式のみ対応
		foreach ($search_result->statuses as $statuses) {
			if (array_key_exists('media', $statuses->entities)) {

				// Twitter公式でのアップロードの場合
				$urls[] = $statuses->entities->media[0]->media_url;

			}
		}

		// 重複削除
		$urls = array_unique($urls);

		return View::make('home.index')->with('img_urls', $urls);
	}

}
