@extends('layouts.app')

@section('title', 'Wiki')
@section('content')
<div class="container-xl">
    <div class="row justify-content row-cards">
        <div class="card card-stacked">
            <div class="card-body">
                <h3 class="card-title">站内Wiki</h3>
                @if($page->count())
                @foreach ($page as $value)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="创建者">
                            <a class="avatar avatar-rounded" style="background-image: url({{ user_avatars($value->user->email,$value->user->avatar) }})" href="{{ route('public.user.about',['id' => $value->user->id]) }}"></a>
                        </div>

                        <div class="col">
                            <a data-bs-toggle="tooltip" data-bs-placement="left" title="分类标题" href="{{ route('wiki.class',['ename' => $value->ename]) }}" class="card-title text-body d-block">{{ $value->title }}</a>
                            <small
                                class="d-block text-muted text-truncate mt-n1">由 {{ $value->user->username }} 创建于 {{ format_date($value['created_at']) }}
                            </small>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('wiki.class',['ename' => $value->ename]) }}" class="btn btn-ghost-dark">查看</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a class="avatar avatar-rounded" href="#"></a>
                        </div>

                        <div class="col">
                            <a href="#" class="text-body d-block">暂无无内容</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            {{ $page->links() }}
        </div>
    </div>
</div>
@endsection
