<?php

namespace App\ApiDoc;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *      title="registration formOne",
 *      description="registration request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class FormOne extends Model
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of person",
     *      example="Mr"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="fullname",
     *      description="Name of the customer",
     *      example="Kishore"
     * )
     *
     * @var string
     */
    public $fullname;

    /**
     * @OA\Property(
     *      title="birthDate",
     *      description="Customer's dob",
     *      format="int64",
     *      example=29111997
     * )
     *
     * @var integer
     */
    public $birthDate;  
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
     *      title="aadhaar",
     *      description="Customer's Aadhaar card number",
     *      example=983672341234
     * )
     *
     * @var integer
     */
    public $aadhaar;  
    /**
     * @OA\Property(
     *      title="address1",
     *      description="Customer's address line1",
     *      example="44,labour colony4th street" 
     * )
     *
     * @var string
     */
    public $address1;  
     /**
     * @OA\Property(
     *      title="address2",
     *      description="Customer's address line2",
     *      example="Ekkatuthangal" 
     * )
     *
     * @var string
     */
    public $address2; 
    /**
     * @OA\Property(
     *      title="landmark",
     *      description="Landmark of customer's address",
     *      example="Near ICICI bank"
     * )
     *
     * @var string
     */
    public $landmark;  
    /**
     * @OA\Property(
     *      title="city",
     *      description="Name of city",
     *      example="chennai"
     * )
     *
     * @var string
     */
    public $city;  
    /**
     * @OA\Property(
     *      title="state",
     *      description="Name of State",
     *      example="Tamilnadu"
     * )
     *
     * @var string
     */
    public $state;  
    /**
     * @OA\Property(
     *      title="pincode",
     *      description="pincode od city",
     *      format="int64",
     *      example=600019
     * )
     *
     * @var integer
     */
    public $pincode;  
    /**
     * @OA\Property(
     *      title="email",
     *      description="Customer's Email address",
     *      example="kishore98@gmail.com"
     * )
     *
     * @var string
     */
    public $email;  
    /**
     * @OA\Property(
     *      title="phoneNumber",
     *      description="Customer's Mobile Number",
     *      format="int64",
     *      example=9998766477
     * )
     *
     * @var integer
     */
    public $phoneNumber;  
    /**
     * @OA\Property(
     *      title="alternatenumber",
     *      description="Customer's Alternate Mobile Number",
     *      format="int64",
     *      example=9998766499
     * )
     *
     * @var integer
     */
    public $alternatenumber;  
    /**
     * @OA\Property(
     *      title="insurance_detail",
     *      description="Customer's Insurance number",
     *      format="int64",
     *      example=231443
     * )
     *
     * @var integer
     */
    public $insurance_detail; 
    /**
     * @OA\Property(
     *      title="insurance_name",
     *      description="Name of Insurance Company",
     *      example="New India Assurance company"
     * )
     *
     * @var string
     */
    public $insurance_name; 
    /**
     * @OA\Property(
     *      title="car_details",
     *      description="Name of car",
     *      example="Bmw"
     * )
     *
     * @var string
     */
    public $car_details; 
    /**
     * @OA\Property(
     *      title="bike_details",
     *      description="Name of bike",
     *      example="yamaha"
     * )
     *
     * @var string
     */
    public $bike_details; 
    /**
     *  @OA\Property(property="addmorebusiness", type="object",
     *  type="array",
     *  @OA\Items(
     *  @OA\Property(property="businessName", type="string"),
     *  @OA\Property(property="gst", type="string"),
     *  ),
     *  ),
     * 
     */
    

         
}
