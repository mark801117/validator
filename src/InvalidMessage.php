<?php
namespace Cloud\Validator;

/**
 * Description of InvalidMessage
 *
 * @author cloud
 */
class InvalidMessage 
{
    const msg = [
        'required' => "%s 為必填欄位",
        'email' => "%s 必須為E-Mail格式",
        'length' => "%s 長度必須介於 %s ~ %s 個字元",
        'isInt' => "%s 必須為整數型態",
        'isFloat' => "%s 必須為數字型態",
        'isUrl' => "%s 必須為URL 型態",
        'IP' => "%s 必須為IP 型態",
        'dateISO' => "%s 必須為 YYYY-MM-DD 日期格式",
        'maxLength' => "%s 必須在 %s 個字元以內",
        'minLength' => "%s 至少必須 %s 個字元",
        'maxValue' => "%s 最大值為 %s",
        'minValue' => "%s 最小值為 %s",
        'range' => "%s 必須為介於 %s 與 %s 的數值",
        'equal' => "%s 必須為 %s",
        'regex' => "%s 格式錯誤",
        'unique' => "%s 該值已被使用",
        'custom' => "%s 不符合自訂驗證規則",
    ];
}
