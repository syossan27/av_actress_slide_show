<?php

class HomeController extends BaseController {

	public function index()
	{

		// Twitter検索結果取得
		$search_result = Twitter::getSearch(['q' => '#AV女優自画撮り部',
											'result_type' => 'recent', 
											'count' => '100', 
											'include_entities' => 'true']);

		$urls = [];

		// 検索結果から画像を抽出
		foreach ($search_result->statuses as $statuses) {
			if (array_key_exists('media', $statuses->entities)) {

				// Twitter公式でのアップロードの場合
				$urls[] = $statuses->entities->media[0]->media_url;

			} else if ( array_key_exists('urls', $statuses->entities) ) {

				if ( array_key_exists('0', $statuses->entities->urls) ) {
					if ( array_key_exists('expanded_url', $statuses->entities->urls[0]) ) {
						// 公式以外でのアップロードの場合
						$url = $statuses->entities->urls[0]->expanded_url;
						$urls[] = $url;
						continue;

						// 短縮URL時の元URLパース処理
						if( $headers = get_headers($url) ){
							if ( array_key_exists('7', $headers) && strpos($headers[7], '/Location: /') != false) {	
								$origin_url = preg_replace('/Location: /', '', $headers[7]);
							} else if ( array_key_exists('8', $headers) && strpos($headers[8], '/Location: /') != false){
								$origin_url = preg_replace('/Location: /', '', $headers[8]);
							}
						}

						// 短縮URLパターンの例外処理
						if (isset($origin_url)) {
							$urls[] = $origin_url;
						}
					}
				}
			}
		}

		return View::make('home.index')->with('img_urls', $urls);
	}

}
