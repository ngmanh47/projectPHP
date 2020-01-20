<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkPhoneNumVN implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Kiểm tra dữ liệu
        $head_num_mobi = array( '090', '093', '089', '070', '076', '077', '078', '079');
        $head_num_viettel = array( '086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039');
        $head_num_vina = array( '081', '082', '083', '084', '085', '088', '091', '094');
        $head_num_vnm = array( '056', '058', '092');
        $head_num_gmobile = array( '099', '059');
        $len = strlen($value);
        if($len != 10)
            return false;
        else {
            // kiem tra dau so
            $temp= substr($value, 0, 3);
            for($i = 0; $i < count($head_num_mobi); $i++){
                if($temp != $head_num_mobi[$i])
                    return false;
            }
            for($i = 0; $i < count($head_num_viettel); $i++){
                if($temp != $head_num_viettel[$i])
                    return false;
            }
            for($i = 0; $i < count($head_num_vina); $i++){
                if($temp != $head_num_vina[$i])
                    return false;
            }
            for($i = 0; $i < count($head_num_vnm); $i++){
                if($temp != $head_num_vnm[$i])
                    return false;
            }
            for($i = 0; $i < count($head_num_gmobile); $i++){
                if($temp != $head_num_gmobile[$i])
                    return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Không đúng sdt ở Việt Nam.';
    }
}