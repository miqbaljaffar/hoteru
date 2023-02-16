@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
<!-- Page Heading -->
<div class="container">
    <div class="mb-3">
    <link rel="stylesheet" href="/style/progress-indication.css">
     @include('dashboard.order.progressbar')
    </div>
</div>




<div class="container mt-3">
    <div class="row justify-content-md-center">
        <div class="col-md-8 mt-2">
            <div class="card shadow-sm border">
                <div class="card-body p-3">
                    <h2>{{ $roomsCount }} Room Available for:</h2>
                    <p>{{ request()->input('count') }} People On   {{ $stayfrom }}  To {{ $stayto }}
                    </p>
                    <hr>
                    <form method="POST"
                        action="{{ route('chooseroom') }}">
                        @csrf
                        <div class="row mb-2">
                            <input type="hidden" name="c_id" value="{{ request()->input('c_id') }}">
                            <input type="hidden" name="from" value="{{ request()->input('from') }}">
                            <input type="hidden" name="to" value="{{ request()->input('to') }}">
                            <input type="hidden" name="count" value="{{ request()->input('count') }}">
                            <div class="col-lg-6">
                                <select class="form-select" id="sort_name" name="sort_name"
                                    aria-label="Default select example">
                                    <option value="price" @if (request()->input('sort_name') == 'price') selected @endif>Price</option>
                                    <option value="no" @if (request()->input('sort_name') == 'no') selected @endif>Number</option>
                                    <option value="capacity" @if (request()->input('sort_name') == 'capacity') selected @endif>Capacity</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select" id="sort_type" name="sort_type"
                                    aria-label="Default select example">
                                    <option value="ASC" @if (request()->input('sort_type') == 'ASC') selected @endif>Ascending</option>
                                    <option value="DESC" @if (request()->input('sort_type') == 'DESC') selected @endif>Descending</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn myBtn shadow-sm border w-100">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        @forelse ($rooms as $room)
                            <div class="col-lg-12">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-secondary">{{ $room->capacity }}
                                            {{ Str::plural('Person', $room->capacity) }}</strong>
                                        <h3 class="mb-0">{{ $room->number }} ~ {{ $room->type->name }}</h3>
                                        <div class="mb-1 text-muted">Rp.{{ number_format($room->price) }} /
                                            Day
                                        </div>
                                        <div class="wrapper">
                                            <p class="card-text mb-auto demo-1">{{ Illuminate\Support\Str::limit($room->info, 150) }}</p>
                                        </div>
                                        <form action="{{  route('confirmation') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="customer" value="{{ $customer->id }}">
                                            <input type="hidden" name="room" value="{{ $room->id }}">
                                            <input type="hidden" name="from" value="{{ $stayfrom }}">
                                            <input type="hidden" name="to" value="{{ $stayto }}">
                                            <button class="btn myBtn shadow-sm border w-100 m-2">Choose</button>
                                        </form>
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        @if (!$room->Images->count() > 0)
                                        <img src="/img/default-room.png" width="200" height="250" alt="">
                                        @else
                                        <img src="{{ $room->Images }}" width="200" height="250" alt="">

                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>Theres no available room for {{ request()->input('count_person') }} or more
                                person
                            </h3>
                        @endforelse
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            {{ $rooms->onEachSide(1)->appends([
                            'count_person' => request()->input('count_person'),
                            'check_in' => request()->input('check_in'),
                            'check_out' => request()->input('check_out'),
                            'sort_name' => request()->input('sort_name'),
                            'sort_type' => request()->input('sort_type'),
                        ])->links('template.paginationlinks') }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="card shadow-sm">
                @if ($customer->User)
                @if ($customer->User->ImageUser)
                    <img class="myImages" src="{{asset('storage/' . $customer->User->ImageUser->image)}}"
                    style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                    @else
                    <img class="myImages" src="/img/default-user.jpg" style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                @endif
                @else
                <img class="myImages" src="/img/default-user.jpg" style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                @endif

                <div class="card-body">
                    <table>
                        <tr>
                            <td style="text-align: center; width:50px">
                                <span>
                                    <i class="fas {{ $customer->jk == 'L' ? 'fa-male' : 'fa-female' }}">
                                    </i>
                                </span>
                            </td>
                            <td>
                                {{ $customer->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; ">
                                <span>
                                    <i class="fas fa-user-md"></i>
                                </span>
                            </td>
                            <td>{{ $customer->job }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; ">
                                <span>
                                    <i class="fas fa-birthday-cake"></i>
                                </span>
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($customer->birthdate)->isoformat('D MMM YYYY') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center"><i class="fas fa-phone"></i></td>
                            <td>
                                <span>
                                    @if ($customer->User)
                                    @if($customer->User->telp)
                                    0{{ $customer->User->telp }}
                                    @else
                                    -
                                    @endif
                                    @else
                                    -
                                   @endif
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; ">
                                <span>
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </td>
                            <td>
                                {{ $customer->address }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>





{{-- <!-- Content Row -->
<div class="container">
    <div class="card shadow-sm border">
        <div class="card-header">
            <h5> CHOOSE ROOM </h5>
        </div>
        <div class="card-body">
            <div class="album py-5 bg-light">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($rooms as $room)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="/products/{{ $room->slug }}">
                            @if (!$room->images->count() > 0)
                            <img src="/img/default-room.png"
                            class="bd-placeholder-img card-img-top" alt="default" width="214" height="225">
                            @else
                            <img src="https://source.unsplash.com/1400x1200?{{ $room->images[0]->image }}" class="bd-placeholder-img card-img-top" alt="{{ $room->images[0]->image }}" width="214" height="225">
                            @endif

                            <div class="card-body" >
                                <h4 class="card-text" style="height: 52px"><a style="text-decoration: none; color:#4d4949;" href="/products/{{ $room->slug }}"></a></h4>

                                <div class="d-flex justify-content-between align-items-">
                                    <h6  style="color: red">Rp.{{ number_format($room->price) }}</h6>
                                    <h6 class="text-muted mb-3">Stock : {{ $room->quantity }}</h6>
                                </div>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-between align-items-">
                                        <h6></h6>
                                        <div class="btn-group">
                                            <form action="/add-to-cart/{{$room->id}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="btn btn-sm btn-outline-success fa fa-shopping-cart" type="submit"></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                  </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <h4> <a href="/products" class="nav-link"> See other products</a></h4>
                </div>
            </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
