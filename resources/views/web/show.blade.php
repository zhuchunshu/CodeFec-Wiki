@extends('layouts.app')

@section('title', $content->title . ' | ' . $class->title . ' | Wiki')
@section('content')
    <div class="container-xl">
        <div class="row justify-content row-cards">
            <div class="container-xl">
                <!-- Page title -->
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            「<a href="{{ route('wiki.index') }}">{{ $class->title }}</a>」 下的文档
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>
                                    <a href="{{ route('public.user.about', ['id' => $content->user->id]) }}"
                                        class="avatar"
                                        style="background-image: url({{ user_avatars($content->user->email, $content->user->avatar) }})"></a>
                                    {{ $content->title }}
                                </h1>
                                <small><span class="form-help" data-bs-toggle="popover" data-bs-placement="top"
                                        data-bs-html="true" data-bs-content="{{ $content->message }}">?</span> 由 <a
                                        href="{{ route('public.user.about', ['id' => $content->user->id]) }}">{{ $content->user->username }}</a>发表于:{{ format_date($content->created_at) }}</small>
                                <hr style="margin-top:8px;margin-bottom:3px" />
                                <div class="markdown vditor-reset">
                                    {!! Helpers()->markdowntohtml($content->markdown) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="pagination">
                                    @if (!$shang)
                                        <li class="page-item page-prev disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                <div class="page-item-subtitle">上一页</div>
                                                <div class="page-item-title">暂无</div>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item page-prev">
                                            <a class="page-link"
                                                href="{{ route('wiki.show', ['ename' => $shang->class->ename, 'id' => $shang->id]) }}">
                                                <div class="page-item-subtitle">上一页</div>
                                                <div class="page-item-title">{{ Str::limit($shang->title, 20, '...') }}
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($xia)
                                        <li class="page-item page-next">
                                            <a class="page-link"
                                                href="{{ route('wiki.show', ['ename' => $xia->class->ename, 'id' => $xia->id]) }}">
                                                <div class="page-item-subtitle">下一页</div>
                                                <div class="page-item-title">{{ Str::limit($xia->title, 20, '...') }}
                                                </div>
                                            </a>
                                        </li>
                                    @else
                                    <li class="page-item page-next disabled">
                                        <a class="page-link"
                                            href="#">
                                            <div class="page-item-subtitle">下一页</div>
                                            <div class="page-item-title">暂无
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="accordion" id="accordion-example">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-1">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-1" aria-expanded="true">
                                        文档列表
                                    </button>
                                </h2>
                                <div id="collapse-1" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        @foreach ($data as $key => $value)
                                            <div class="col text-truncate">
                                                @if(route('wiki.show', ['ename' => $class->ename, 'id' => $value->id])==url()->current())
                                                <a href="#"
                                                    class="text-body d-block" style="font-size: 23px">{{ $key + 1 }}.{{ $value->title }}</a>
                                                @else
                                                <a style="font-size: 23px" href="{{ route('wiki.show', ['ename' => $class->ename, 'id' => $value->id]) }}">{{ $key + 1 }}.{{ $value->title }}</a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('js/vditor/index.css') }}">
@endsection
