<?php

namespace Luccui\ValueObjects;

class VNPayValueObject implements ValueObject
{
    public function __construct(
        public string $TxnRef,
        public string $OrderInfo,
        public string $OrderType,
        public float  $Amount,
        public string $Locale,
        public string $BankCode,
        public string $ExpireDate,
        public string $Bill_Mobile,
        public string $Bill_Email,
        public string $fullName,
        public string $Bill_Address,
        public string $Bill_City,
        public string $Bill_Country,
        public string $Bill_State,
        public string $Inv_Phone,
        public string $Inv_Email,
        public string $Inv_Customer,
        public string $Inv_Address,
        public string $Inv_Company,
        public string $Inv_Taxcode,
        public string $Inv_Type,
    )
    {
    }

    public function toArray(): array
    {
        $name = explode(' ', $this->fullName);

        return [
            'vnp_TxnRef' => $this->TxnRef,
            'vnp_OrderInfo' => $this->OrderInfo,
            'vnp_OrderType' => $this->OrderType,
            'vnp_Amount' => $this->Amount * 100,
            'vnp_Locale' => $this->Locale,
            'vnp_BankCode' => $this->BankCode,
            'vnp_IpAddr' => $_SERVER['REMOTE_ADDR'],
            'vnp_ExpireDate' => $this->ExpireDate,
            'vnp_Bill_Mobile' => $this->Bill_Mobile,
            'vnp_Bill_Email' => $this->Bill_Email,
            'vnp_fullName' => trim($this->fullName),
            'vnp_Bill_FirstName' => array_shift($name),
            'vnp_Bill_LastName' => array_pop($name),
            'vnp_Bill_Address' => $this->Bill_Address,
            'vnp_Bill_City' => $this->Bill_City,
            'vnp_Bill_Country' => $this->Bill_Country,
            'vnp_Bill_State' => $this->Bill_State,
            'vnp_Inv_Phone' => $this->Inv_Phone,
            'vnp_Inv_Email' => $this->Inv_Email,
            'vnp_Inv_Customer' => $this->Inv_Customer,
            'vnp_Inv_Address' => $this->Inv_Address,
            'vnp_Inv_Company' => $this->Inv_Company,
            'vnp_Inv_Taxcode' => $this->Inv_Taxcode,
            'vnp_Inv_Type' => $this->Inv_Type
        ];
    }
}
