@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    {!! Form::open( ['method' => 'post', 'route' => 'backend.materials.regist', 'enctype'=>'multipart/form-data']) !!}
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>装置管理　＞　登録</h3>
                <table class="table table-bordered treatment2-list">
                    <tbody>
                    {{--material_name--}}
                    <tr>
                        <td class="col-title">装置 <font color="red">※</font></td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['material_name']) )
                            <input type="input" name="material_name" value="{{ Session::get('dataInputs')['material_name'] }}" class="form-control form-control--sm">
                            @else
                            <input type="input" name="material_name" value="{{ old('material_name') }}" class="form-control form-control--sm">
                            @endif
                            @if ($errors->first('material_name'))
                                <span class="error-input">※ {!! $errors->first('material_name') !!}</span>
                            @endif
                        </td>
                    </tr>

                    {{--material_price--}}
                    <tr>
                        <td class="col-title">価格 <font color="red">※</font></td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['material_price']) )
                            <input type="input" name="material_price" value="{{ Session::get('dataInputs')['material_price'] }}" maxlength="4" class="form-control form-control--sm">
                            @else
                            <input type="input" name="material_price" value="{{ old('material_price') }}" maxlength="4" class="form-control form-control--sm">
                            @endif
                            @if ($errors->first('material_price'))
                                <span class="error-input">※ {!! $errors->first('material_price') !!}</span>
                            @endif
                        </td>
                    </tr>

                    {{--material_class1--}}
                    <tr>
                        <td class="col-title">区分 <font color="red">※</font></td>
                        <td colspan="2">
                            @if ( isset(Session::get('dataInputs')['material_class1']) && Session::get('dataInputs')['material_class1'] == 1 )
                            <input type="checkbox" name="material_class1" value="1" checked>
                            @elseif ( old('material_class1') == 1 )
                            <input type="checkbox" name="material_class1" value="1" checked>
                            @else
                            <input type="checkbox" name="material_class1" value="1">
                            @endif
                            オーソネットワーク

                            @if ( isset(Session::get('dataInputs')['material_class2']) && Session::get('dataInputs')['material_class2'] == 1 )
                            <input type="checkbox" name="material_class2" value="1" checked>
                            @elseif ( old('material_class2') == 1 )
                            <input type="checkbox" name="material_class2" value="1" checked>
                            @else
                            <input type="checkbox" name="material_class2" value="1">
                            @endif
                            外注
                            @if ($errors->first('material_class'))
                                <span class="error-input">※ {!! $errors->first('material_class') !!}</span>
                            @endif
                        </td>
                    </tr>

                    {{--material_class2--}}
                    <tr>
                        <td class="col-title">処分予定日 <font color="red">※</font></td>
                        <td colspan="2">
                            @if ( isset(Session::get('dataInputs')['material_disposal']) && Session::get('dataInputs')['material_disposal'] == 4 )
                            <input type="radio" name="material_disposal" value="4" checked>
                            @else
                            <input type="radio" name="material_disposal" value="4" @if(old('material_disposal') == 4) checked @endif>
                            @endif
                            4ヶ月後
                            @if ( isset(Session::get('dataInputs')['material_disposal']) && Session::get('dataInputs')['material_disposal'] == 6 )
                            <input type="radio" name="material_disposal" value="6" checked>
                            @else
                            <input type="radio" name="material_disposal" value="6" @if(old('material_disposal') == 6) checked @endif>
                            @endif
                            6ヶ月後
                            @if ($errors->first('material_disposal'))
                                <span class="error-input">※ {!! $errors->first('material_disposal') !!}</span>
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="確認" type="submit" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    </form>
    <!--END PAGE CONTENT -->
@endsection  