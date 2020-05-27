<?php

namespace App;

use DateTime;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Jenssegers\Agent\Facades\Agent;

class Test implements Arrayable
{
    /** @var string */
    public $id;

    /** @var string */
    public $browser;

    /** @var bool */
    public $shared = false;

    /** @var bool */
    public $external = false;

    /** @var array */
    public $recent = [];

    /** @var array */
    public $delayed = [];

    /** @var bool */
    public $secure = false;

    public static function start(): self
    {
        $id = Str::random();
        $browser = Agent::browser().' '.Agent::version(Agent::browser()).' on '.Agent::platform();

        return (new Test($id, $browser))->save();
    }

    public function __construct(string $id, string $browser)
    {
        $this->id = $id;
        $this->browser = $browser;
    }

    public function appendCookies(Request $request)
    {
        $method = $request->query('method', $request->method());
        $type = $request->route('type');

        $this->{$type}[$method] = array_merge(
            $this->{$type}[$method] ?? [],
            collect($request->cookie())->filter(fn ($value) => $value === $this->id)->keys()->all()
        );
    }

    public function save(): self
    {
        Cache::put($this->id, $this, new DateTime('+1 Day'));

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'browser' => $this->browser,
            'shared' => $this->shared,
            'external' => $this->external,
            'recent' => $this->recent,
            'delayed' => $this->delayed,
        ];
    }
}
