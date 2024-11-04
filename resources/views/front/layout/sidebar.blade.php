    @if(!session()->get('session_short_name'))
        @php
        $current_short_name = $global_short_name;
        @endphp
    @else
        @php
        $current_short_name = session()->get('session_short_name');
        @endphp
    @endif
    @php
        $current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
    @endphp

    <div class="sidebar">


        <div class="widget">
            <div class="tag-heading">
                <h2>{{ TAGS }}</h2>
            </div>
            <div class="tag">
                @php
                $all_tags = \App\Models\Tag::select('tag_name')->distinct()->get();
                @endphp
                @foreach($all_tags as $item)
                @php
                    $count = 0;
                    $all_data = \App\Models\Tag::where('tag_name',$item->tag_name)->get();
                    foreach($all_data as $row) {
                        $temp = \App\Models\Post::where('id',$row->post_id)->where('language_id',$current_language_id)->count();
                        if($temp>0) {
                            $count=1;
                            break;
                        }
                    }
                    if($count==0)
                    {
                        continue;
                    }
                @endphp
                <div class="tag-item">
                    <a href="{{ route('tag_posts_show',$item->tag_name) }}"><span class="badge bg-secondary">{{ $item->tag_name }}</span></a>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="widget">
            <div class="news">
                <div class="news-heading">
                    <h2>{{ POPULAR_RECENT_NEWS }}</h2>
                </div>           

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ RECENT_NEWS }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ POPULAR_NEWS }}</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        @php
                        $recent_news_data = \App\Models\Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('id','desc')->get();
                        @endphp
                        @foreach($recent_news_data as $item)
                            @if($loop->iteration > 5)
                                @break
                            @endif
                            <div class="news-item">
                                <div class="left">
                                    <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                </div>
                                <div class="right">
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void;">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $ts = strtotime($item->updated_at);
                                            $updated_date = date('d F, Y',$ts);
                                            @endphp
                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @php
                        $popular_news_data = \App\Models\Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('visitors','desc')->get();
                        @endphp
                        @foreach($popular_news_data as $item)
                            @if($loop->iteration > 5)
                                @break
                            @endif
                            <div class="news-item">
                                <div class="left">
                                    <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                </div>
                                <div class="right">
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void;">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $ts = strtotime($item->updated_at);
                                            $updated_date = date('d F, Y',$ts);
                                            @endphp
                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach                    
                    </div>
                </div>
            </div>
        </div>

    </div>