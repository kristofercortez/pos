<?php

namespace Gist\AccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gist\CoreBundle\Template\Entity\HasGeneratedID;
use Gist\CoreBundle\Template\Entity\TrackCreate;

use DateTime;
use stdClass;

/**
 * @ORM\Entity
 * @ORM\Table(name="acct_bank_account")
 */

class BankAccount
{


    use HasGeneratedID;
    use TrackCreate;



    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $name;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $account_number;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $branch;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $currency;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $type;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $chart_of_account;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     */
    protected $bank;


    public function __construct()
    {
        $this->initTrackCreate();
    }

    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    public function getBank()
    {
        return $this->bank;
    }



    /**
     * Set name
     *
     * @param string $name
     *
     * @return BankAccount
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getNameFormatted()
    {
        return $this->account_number .' - '. $this->name;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     *
     * @return BankAccount
     */
    public function setAccountNumber($accountNumber)
    {
        $this->account_number = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Set branch
     *
     * @param string $branch
     *
     * @return BankAccount
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * Get branch
     *
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return BankAccount
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return BankAccount
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set chartOfAccount
     *
     * @param string $chartOfAccount
     *
     * @return BankAccount
     */
    public function setChartOfAccount($chartOfAccount)
    {
        $this->chart_of_account = $chartOfAccount;

        return $this;
    }

    /**
     * Get chartOfAccount
     *
     * @return string
     */
    public function getChartOfAccount()
    {
        return $this->chart_of_account;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return BankAccount
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function toData()
    {
        $data = new \stdClass();
        $this->dataHasGeneratedID($data);
        $this->dataTrackCreate($data);
        return $data;
    }
}
