<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Backend
    |--------------------------------------------------------------------------
    |
    */
    //Photo Model
    'error_photo_name_required'                     => '種類を入力してください。',
    'error_photo_price_required'                    => '価格を入力してください。',
    'error_photo_price_numeric'                     => '価格は数字でなければなりません。',

    //Lesson Model
    'error_lecture_name_required'                   => '種類を入力してください。',
    'error_lecture_price_required'                  => '価格を入力してください。',
    'error_lecture_price_numeric'                   => '価格は数字でなければなりません。',

    //Equipment Model
    'error_equipment_category_required'             => '名目を選択してください。',
    'error_equipment_name_required'                 => '備品名を入力してください。',
    'error_equipment_price_required'                => '価格を入力してください。',
    'error_equipment_price_numeric'                 => '価格は数字でなければなりません。',

    //material
    'error_material_name_required'                  => '装置を入力してください。',
    'error_material_price_required'                 => '価格を入力してください。',
    'error_material_price_numeric'                  => '数値形式を入力してください。',
    'error_material_class_required'                 => '区分を入力してください。',
    'error_material_disposal_required'              => '処分予定日を入力してください。',

    //option
    'error_option_name_required'                    => 'オプション名を入力してください。',
    'error_option_price_required'                   => '価格を入力してください。',
    'error_option_price_numeric'                    => '数値形式を入力してください。',

    //user
    'error_u_f_name_required'                       => '氏名を入力してください。',
    'error_u_g_name_required'                       => '氏名を入力してください。',
    'error_u_f_name_kana_required'                  => '氏名カナを入力してください。',
    'error_u_f_name_kana_regex'                     => '氏名カナを入力してください。',
    'error_u_g_name_kana_required'                  => '氏名カナを入力してください。',
    'error_u_g_name_kana_regex'                     => '氏名カナを入力してください。',
    'error_u_name_required'                         => '表示用氏名を入力してください。',
    'error_u_login_required'                        => 'ユーザーIDを入力してください。',
    'error_u_login_unique'                          => 'ユーザーIDすでに存在しています',
    'error_u_passwd_required'                       => 'パスワードを入力してください。',
    'error_u_power_required'                        => '権限を入力してください。',
    'error_u_shift_required'                        => 'シフト利用を入力してください。',
    'error_u_acronym_required'                      => 'シフトでのアイコンの色を入力してください。',

    //hospital
    'error_hospital_display_required'               => '表示名を入力してください。',
    'error_hospital_name_required'                  => '正式名称を入力してください。',
    'error_hospital_doctor_required'                => '院長名を入力してください。',
    'error_hospital_zip_required'                   => '郵便番号を入力してください。',
    'error_pref_code_required'                      => '都道府県を入力してください。',
    'error_hospital_address_required'               => '住所を入力してください。',
    'error_hospital_tel_required'                   => '電話番号を入力してください。',
    'error_hospital_email_email'                    => '不正な形式の電子メール',

    //ShiftKind Model
    'error_kshift_name_required'                    => '種別名を入力してください。',

    //Working Model
    'error_working_name_required'                   => '出勤名を入力してください。',

    //Holiday Model
    'error_holiday_working_required'                => '種別名を選択してください。',

];
