<?php

namespace App;

use DateTime;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Test implements Arrayable
{
    /** @var string */
    public $id;

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
        return (new Test(Str::random()))->save();
    }

    public static function load(Request $request): self
    {
        abort_unless($test = Cache::get($request->query('id')), 404);

        return $test;
    }

    public function __construct(string $id)
    {
        $this->id = $id;
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
            'shared' => $this->shared,
            'external' => $this->external,
            'recent' => $this->recent,
            'delayed' => $this->delayed,
        ];
    }
}
