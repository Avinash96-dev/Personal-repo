<?php

namespace App\ApiDoc;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="registration formTwo ",
 *      description="registration request body data",
 *      type="object",
 * )
 */

class FormTwo extends Model
{
     /**
     * @OA\Property(
     *      title="businessName",
     *      description="Name of businessname",
     *      example="Aathi Earth Movers"
     * )
     *
     * @var string
     */
    public $businessName;

    /**
     * @OA\Property(
     *      title="gst",
     *      description="customer's Gst Number",
     *      example="22ASDFR1234N1Z5"
     * )
     *
     * @var string
     */
    public $gst;
    /**
     * @OA\Property(
     *      title="pan",
     *      description="Customer's pan card number",
     *      example="aybpt1656n"
     * )
     *
     * @var string
     */
    public $pan;  
    /**
     * @OA\Property(
     *      title="it_status",
     *      description="Customer's It status",
     *      example="It Status"
     * )
     *
     * @var string
     */
    public $it_status;  
    /**
     * @OA\Property(
     *      title="it_others",
     *      description="Customer's It others ",
     *      example="It others"
     * )
     *
     * @var string
     */
    public $it_others;  
    /**
     * @OA\Property(
     *      title="contact_person",
     *      description="Name of contact person",
     *      example="Aathi"
     * )
     *
     * @var string
     */
    public $contact_person;  
    /**
     * @OA\Property(
     *      title="designation",
     *      description="Designation of contact person",
     *      example="Manager"
     * )
     *
     * @var string
     */
    public $designation;  
    /**
     * @OA\Property(
     *      title="businessAddress1",
     *      description="Business addressline1 of customers",
     *      example="44/12,sarangapani street"
     * )
     *
     * @var string
     */
    public $businessAddress1;  
    /**
     * @OA\Property(
     *      title="businessAddress2",
     *      description="Business addressline2 of customers",
     *      example="T.nagar"
     * )
     *
     * @var string
     */
    public $businessAddress2;  
    /**
     * @OA\Property(
     *      title="landmark",
     *      description="Landmark of customer's address",
     *      example="Archana Apartment"
     * )
     *
     * @var string
     */
    public $landmark;  
    /**
     * @OA\Property(
     *      title="City",
     *      description="Name of city",
     *      example="chennai"
     * )
     *
     * @var string
     */
    public $City;  
    /**
     * @OA\Property(
     *      title="State",
     *      description="Name of State",
     *      example="Tamilnadu"
     * )
     *
     * @var string
     */
    public $State;  
    /**
     * @OA\Property(
     *      title="pincode",
     *      description="pincode od city",
     *      format="int64",
     *      example=600034
     * )
     *
     * @var integer
     */
    public $pincode;  
    /**
     * @OA\Property(
     *      title="Email",
     *      description="Business Email address",
     *      example="Aathi98@gmail.com"
     * )
     *
     * @var string
     */
    public $Email;  
    /**
     * @OA\Property(
     *      title="phoneNumber",
     *      description="Customer's Mobile Number",
     *      format="int64",
     *      example=9988556433
     * )
     *
     * @var integer
     */
    public $PhoneNumber;  
    /**
     * @OA\Property(
     *      title="Alternatenumber",
     *      description="Customer's Alternate Mobile Number",
     *      format="int64",
     *      example=9988556456
     * )
     *
     * @var integer
     */
    public $Alternatenumber; 
    
    /**
     * @OA\Property(
     *      title="bank_name",
     *      description="Name of bank",
     *      example="HDFC Bank"
     * )
     *
     * @var string
     */
    public $bank_name;
    /**
     * @OA\Property(
     *      title="branch_name",
     *      description="Name of bankbranch",
     *      example="T.nagar"
     * )
     *
     * @var string
     */
    public $branch_name;
    /**
     * @OA\Property(
     *      title="account_type",
     *      description="Name of Account type",
     *      example="Savings"
     * )
     *
     * @var string
     */
    public $account_type;
    /**
     * @OA\Property(
     *      title="account_no",
     *      description="Account number of customer",
     *      format="int64",
     *      example="65435322432"
     * )
     *
     * @var integer
     */
    public $account_no;
    /**
     * @OA\Property(
     *      title="ifsc_code",
     *      description="IFSC code of customer",
     *      format="int64",
     *      example="HDFC1234567"
     * )
     *
     * @var string
     */
    public $ifsc_code;
    /**
     * @OA\Property(
     *      title="od_cc_details",
     *      description="od cc details of customer",
     *      example="od cc details"
     * )
     *
     * @var string
     */
    public $od_cc_details;
    /**
     * @OA\Property(
     *      title="loan_details",
     *      description="loan details of customers",
     *      example="personal loan"
     * )
     *
     * @var string
     */
    public $loan_details;
    /**
     * @OA\Property(
     *      title="fleet_units",
     *      description="Number of fleets",
     *      format="int64",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $fleet_units;
    /**
     * @OA\Property(
     *      title="fleet_category",
     *      description="Name of fleet",
     *      example="Backhoe"
     * )
     *
     * @var string
     */
    public $fleet_category;
    /**
     * @OA\Property(
     *      title="brand",
     *      description="Name of fleet brand",
     *      example="case"
     * )
     *
     * @var string
     */
    public $brand;
    /**
     * @OA\Property(
     *      title="model",
     *      description="Name of fleet model",
     *      example="CASE12H6"
     * )
     *
     * @var string
     */
    public $model;
    /**
     * @OA\Property(
     *      title="year_of_mfg",
     *      description="year of manufacturing",
     *      format="int64",
     *      example="2008"
     * )
     *
     * @var integer
     */
    public $year_of_mfg;
    /**
     * @OA\Property(
     *      title="finance",
     *      description="Fleet finance",
     *      example="finance"
     * )
     *
     * @var string
     */
    public $finance;
    /**
     * @OA\Property(
     *      title="insurance_name",
     *      description="Name of Insurance Name",
     *      example="Bajaj insurance"
     * )
     *
     * @var string
     */
    public $insurance_name;
    /**
     * @OA\Property(
     *      title="remarks",
     *      description="Remarks",
     *      example="Remarks"
     * )
     *
     * @var string
     */
    public $remarks;
   
   
}
