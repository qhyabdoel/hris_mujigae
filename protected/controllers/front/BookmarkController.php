<?php
class BookmarkController extends Controller
{
	public function actions() {
		return array(
			'get_tweets' => array(
				'class' => 'ext.new-tweet.TweetFetch'
			)
		);
	}
}