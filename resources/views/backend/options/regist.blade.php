@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    {!! Form::open( ['method' => 'post', 'route' => 'backend.options.regist', 'enctype'=>'multipart/form-data']) !!}
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>オプション　＞　登録</h3>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">オプション名 <font color="red">※</font></td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['option_name']) )
                            <input type="input" name="option_name" value="{{ Session::get('dataInputs')['option_name'] }}" class="form-control form-control--sm">
                            @else
                            <input type="input" name="option_name" value="{{ old('option_name') }}" class="form-control form-control--sm">
                            @endif
                            @if ($errors->first('option_name'))
                            <span class="error-input">※ {!! $errors->first('option_name') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">価格 <font color="red">※</font></td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['option_price']) )
                            <input type="input" name="option_price" value="{{ Session::get('dataInputs')['option_price'] }}" maxlength="4" class="form-control form-control--sm">
                            @else
                            <input type="input" name="option_price" value="{{ old('option_price') }}" maxlength="4" class="form-control form-control--sm">
                            @endif
                            @if ($errors->first('option_price'))
                            <span class="error-input">※ {!! $errors->first('option_price') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">装置</td>
                        <td>
                            <input value="全てチェックする" id="checkAll" onclick="" type="button" class="btn btn-sm btn-page">
                            <input value="全てチェックはずす" id="unCheckAll" onclick="" type="button" class="btn btn-sm btn-page">

                            <div class="row">
                                <div class="col-md-6">

                                    @foreach ( $materials as $material )
                                    <div class="col-sm-6 col-md-6">
                                        <div class="radio">
                                            @if ( !empty(Session::get('dataInputs')['material_id']) && count(Session::get('dataInputs')['material_id']) > 0 )
                                            <label><input class="material-id" name="material_id[]" value="{{ $material->material_id }}" type="checkbox" @if(in_array($material->material_id, Session::get('dataInputs')['material_id'])) checked @endif> {{ $material->material_name }}</label>
                                            @else
                                            <label><input class="material-id" name="material_id[]" value="{{ $material->material_id }}" type="checkbox" > {{ $material->material_name }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </td>
                    </tr>
                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <br>
                    <input value="確認" type="submit" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    </form>
    <!--END PAGE CONTENT -->

    <script>
        $(document).ready(function() {
            $("#checkAll").click(function(){
                $('.material-id').prop('checked', true);
            });
            $("#unCheckAll").click(function(){
                $('.material-id').prop('checked', false);
            });
        });
    </script>
@endsection  