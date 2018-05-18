<?php

namespace Jorenvh\Share;

class Share
{
    /**
     * The url of the page to share
     *
     * @var string
     */
    protected $url;

    /**
     * Optional text for Twitter
     * and Linkedin title
     *
     * @var string
     */
    protected $title;

    /**
     * Extra options for the share links
     *
     * @var array
     */
    protected $options = [];

    /**
     * Html to prefix before the share links
     *
     * @var string
     */
    protected $prefix = '<div id="social-links"><ul>';

    /**
     * Html to append after the share links
     *
     * @var string
     */
    protected $suffix = '</ul></div>';

    /**
     * The generated html
     *
     * @var string
     */
    protected $html = '';

    /**
     * Return a string with html at the end
     * of the chain.
     *
     * @return string
     */
    public function __toString()
    {
        $this->html = $this->prefix . $this->html;
        $this->html .= $this->suffix;

        return $this->html;
    }

    /**
     * @param $url
     * @param null $title
     * @param array $options
     * @param null $prefix
     * @param null $suffix
     * @return $this
     */
    public function page($url, $title = null, $options = [], $prefix = null, $suffix = null)
    {
        $this->url = $url;
        $this->title = $title;
        $this->options = $options;

        $this->setPrefixAndSuffix($prefix, $suffix);

        return $this;
    }

    /**
     * @param null $title
     * @param array $options
     * @param null $prefix
     * @param null $suffix
     * @return $this
     */
    public function currentPage($title = null, $options = [], $prefix = null, $suffix = null)
    {
        $url = request()->getUri();

        return $this->page($url, $title, $options, $prefix, $suffix);
    }

    /**
     * Facebook share link
     *
     * @return $this
     */
    public function facebook()
    {
        $url = config('laravel-share.services.facebook.uri') . $this->url;

        $this->buildLink('facebook', $url);

        return $this;
    }

    /**
     * Twitter share link
     *
     * @return $this
     */
    public function twitter()
    {
        if (is_null($this->title)) {
            $this->title = config('laravel-share.services.twitter.text');
        }

        $base = config('laravel-share.services.twitter.uri');
        $url = $base . '?text=' . urlencode($this->title) . '&url=' . $this->url;

        $this->buildLink('twitter', $url);

        return $this;
    }

    /**
     * Google Plus share link
     *
     * @return $this
     */
    public function googlePlus()
    {
        $url = config('laravel-share.services.gplus.uri') . $this->url;

        $this->buildLink('gplus', $url);

        return $this;
    }

    /**
     * Linked in share link
     *
     * @param string $summary
     * @return $this
     */
    public function linkedin($summary = '')
    {
        $base = config('laravel-share.services.linkedin.uri');
        $mini = config('laravel-share.services.linkedin.extra.mini');
        $url = $base . '?mini=' . $mini . '&url=' . $this->url . '&title=' . urlencode($this->title) . '&summary=' . urlencode($summary);

        $this->buildLink('linkedin', $url);

        return $this;
    }

    /**
     * Build a single link
     *
     * @param $provider
     * @param $url
     */
    protected function buildLink($provider, $url)
    {
        $fontAwesomeVersion = config('laravel-share.fontAwesomeVersion', 4);

        $this->html .= trans("laravel-share::laravel-share-fa$fontAwesomeVersion.$provider", [
            'url' => $url,
            'class' => key_exists('class', $this->options) ? $this->options['class'] : '',
            'id' => key_exists('id', $this->options) ? $this->options['id'] : '',
        ]);

    }

    /**
     * Optionally Set custom prefix and/or suffix
     *
     * @param $prefix
     * @param $suffix
     */
    protected function setPrefixAndSuffix($prefix, $suffix)
    {
        if (!is_null($prefix)) {
            $this->prefix = $prefix;
        }

        if (!is_null($suffix)) {
            $this->suffix = $suffix;
        }
    }
}
