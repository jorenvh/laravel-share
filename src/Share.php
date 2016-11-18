<?php

namespace Jorenvh\Share;

class Share
{

    protected $url;

    protected $title;

    protected $options = [];

    protected $html = '';

    public function page($url, $title = null, $options = [])
    {
        $this->url = $url;
        $this->title = $title;
        $this->options = $options;

        return $this;
    }

    public function facebook()
    {
        $base = config('laravel-share.services.facebook.uri');
        $this->html .= trans('laravel-share::laravel-share.facebook', [
            'url' => $base . $this->url,
            'class' => key_exists('class', $this->options) ? $this->options['class'] : '',
            'id' => key_exists('id', $this->options) ? $this->options['id'] : '',
        ]);

        return $this->html;
    }

    public function twitter()
    {
        if(is_null($this->title)) {
            $this->title = config('laravel-share.services.twitter.text');
        }
        $base = config('laravel-share.services.twitter.uri');
        $this->html .= trans('laravel-share::laravel-share.twitter', [
            'url' => $base . '?text=' . $this->title . '&url=' . $this->url,
            'class' => key_exists('class', $this->options) ? $this->options['class'] : '',
            'id' => key_exists('id', $this->options) ? $this->options['id'] : '',
        ]);

        return $this->html;
    }

    public function googlePlus()
    {
        $base = config('laravel-share.services.gplus.uri');
        $this->html .= trans('laravel-share::laravel-share.gplus', [
            'url' => $base . $this->url,
            'class' => key_exists('class', $this->options) ? $this->options['class'] : '',
            'id' => key_exists('id', $this->options) ? $this->options['id'] : '',
        ]);

        return $this->html;
    }

    public function linkedin($summary = '')
    {
        $base = config('laravel-share.services.linkedin.uri');
        $this->html .= trans('laravel-share::laravel-share.linkedin', [
            'url' => $base . '?mini='.config('laravel-share.services.linkedin.extra.mini').'&url=' . $this->url . '&title=' . $this->title . '&summary=' . $summary,
            'class' => key_exists('class', $this->options) ? $this->options['class'] : '',
            'id' => key_exists('id', $this->options) ? $this->options['id'] : '',
        ]);

        return $this->html;
    }

    public function email()
    {
        //
    }
}
