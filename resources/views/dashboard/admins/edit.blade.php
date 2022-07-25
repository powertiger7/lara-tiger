@extends('layout.master')

@section('page')
 {{__("site.admins")}}
@endsection

@section('link')
{{route('dashboard.admins.index')}}
@endsection

@section('content')


     <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-style">
                <h3 class="card-title" style="float: left">{{__("site.edit_admin")}}</h3>
                <a href="{{ route("dashboard.admins.index") }}"><button style="float:right" class="btn btn-primary" title="{{ __("site.show_admins") }}"><i class="fa fa-eye"></i></button></a>
              <div class="clearfix"></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{route("dashboard.admins.update", $admin->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">{{__('site.name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$admin->name}}" placeholder="{{__('site.enter') . '  ' . __('site.name')}}">
                </div>

                <div class="form-group">
                    <label for="username">{{__('site.username')}}</label>
                    <input type="username" class="form-control" name="username" id="username" value="{{$admin->username}}" placeholder="{{__('site.enter') . '  ' . __('site.username')}}">
                </div>

                <div class="form-group">
                  <label for="email">{{__('site.email')}}</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{$admin->email}}" placeholder="{{__('site.enter') . '  ' . __('site.email')}}">
                </div>

                <div class="form-group">
                    <label for="password">{{__('site.password')}}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('site.enter') . '  ' . __('site.password')}}">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{__('site.password_confirmation')}}</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{old("password_confirmation")}}" placeholder="{{__('site.enter') . '  ' . __('site.password_confirmation')}}">
                </div>

                <div class="form-group">
                    <label>{{__('site.permissions')}}</label>
                    <div class="row">
                      <div class="col-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                          <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3" style="color:#042e7b;font-weight:bold">{{__('site.permissions')}}</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                              @foreach ($models as $index => $model)
                              <li class="nav-item"><a class="nav-link" href="#{{$model}}" data-toggle="tab">{{__('site.'.$model)}}</a></li>
                              @endforeach
                            </ul>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                            <div class="tab-content">
                              @foreach ($perms as $model => $maps)
                              <div class="tab-pane" id="{{$model}}">
                                @foreach ($perms[$model] as $map)
                                @if ($admin->hasPermission($map . '_' . $model))
                                <label><input type="checkbox" name="permissions[]" value="{{$map}}_{{$model}}" checked> {{__("site.".$map)}} </label>    <br>

                                @else
                                <label><input type="checkbox" name="permissions[]" value="{{$map}}_{{$model}}"> {{__("site.".$map)}} </label>    <br>

                                @endif
                                @endforeach
                              </div>
                              @endforeach
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- END CUSTOM TABS -->
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('site.save')}}</button>
                </div>
              </div>

              </form>
            </div>
            <!-- /.card-body -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection


@section('js')

<script src="{{ asset("js/custom/admins.js") }}" defer></script>

@endsection
