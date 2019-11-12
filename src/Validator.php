<?php
namespace Cloud\Validator;

use Cloud\Validator\Exceptions\InvalidException;
use Cloud\Validator\Exceptions\validatorException;
use Cloud\Collection\Collection;
/**
 * Description of Validator
 *
 * @author cloud
 */
class Validator
{
    /**
     * 驗證區收集器
     * @var type 
     */
    private $collection;
    /**
     * 驗證方法收集器
     * @var type 
     */
    private $rule_collection;
    
    public function __construct() 
    {
        $this->collection = new Collection();
        $this->rule_collection = new Collection();
    }
    public function valid()
    {
        $vf_collection = $this->collection->getCollection();
        $result = true;
        $invalid = [];
        foreach ($vf_collection as $vf) {
            $value = $vf->getVal();
            $column_name = $vf->getName();
            $rules = $vf->getRules();
            foreach ($rules as $rule) {
                $rule_name = $rule['name'];
                $args = $rule['args'];
                $v = $this->getValidation($rule_name);
                if (!$v->valid($value, $args)) {
                    $result = false;
                    if (isset($vf->getRules()[$rule_name]['message'])) {
                        $invalid[$vf->getId()][$rule_name] = $vf->getRules()[$rule_name]['message'];
                        continue;
                    }
                    $invalid[$vf->getId()][$rule_name] = $this->getInvalidMsgs($rule_name, $column_name, $args);
                }
            }
        }
        if (!$result) {
            throw new InvalidException($invalid);
        }
        return $result;
    }
    
    /**
     * Add a ValidField to collection
     * 新增一個驗證區, 並加入收集器
     * @param string $id 欄位id
     * @param string $name 欄位名稱
     * @param mixed $val 欄位值
     * @param bool $required 是否為必填
     * @return ValidField 回傳驗證區
     */
    public function rule($id, $name, $val, $required = false)
    {
        $this->checkExist($id);
        $vf = new ValidField($id, $name, $val, $required);
        $this->addValidField($id, $vf);
        return $vf;
    }
    
    public function addValidField($id, ValidField $vf)
    {
        $this->collection->push($id, $vf);
    }
    
    /**
     * 取得規則對應的invalid message
     * @param string $rule_name 規則
     * @param string $column_name 驗證欄位名稱
     * @param array $args 驗證參數值
     * @return void
     */
    private function getInvalidMsgs($rule_name, $column_name, array $args)
    {
        $percent_s = array_merge([$column_name], $args);
        return vsprintf(InvalidMessage::msg[$rule_name], $percent_s);
    }
    
    private function getValidation($rule_name)
    {
        if (!$this->rule_collection->exist($rule_name)) {
            $class = 'Cloud\\Validator\\Rules\\'.ucfirst($rule_name);
            $v = new $class();
            $this->rule_collection->push($rule_name, $v);
        }
        return $this->rule_collection->get($rule_name);
    }
    
    private function checkExist($id)
    {
        if ($this->collection->exist($id)) {
            throw new validatorException(sprintf("'%s' already has a validation rule", $id));
        }
    }
}
