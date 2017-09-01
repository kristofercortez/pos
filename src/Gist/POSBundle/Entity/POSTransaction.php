<?php

namespace Gist\POSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gist\CoreBundle\Template\Entity\HasGeneratedID;
use Gist\CoreBundle\Template\Entity\TrackCreate;

use DateTime;
use stdClass;

/**
 * @ORM\Entity
 * @ORM\Table(name="gist_pos_trans")
 */

class POSTransaction
{


    use HasGeneratedID;
    use TrackCreate;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $trans_display_id;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $transaction_total;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $transaction_balance;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $customer_id;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $transaction_type;

    /** @ORM\Column(type="string", length=150, nullable=true) */
    protected $transaction_mode;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $status;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $synced_to_erp;


    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $tax_rate;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $orig_vat_amt;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $new_vat_amt;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $orig_amt_net_vat;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $new_amt_net_vat;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $tax_coverage;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $cart_min;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $cart_orig_total;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $cart_new_total;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    protected $bulk_discount_type;

    /** @ORM\OneToMany(targetEntity="POSTransactionItem", mappedBy="transaction") */
    protected $items;

    /** @ORM\OneToMany(targetEntity="POSTransactionPayment", mappedBy="transaction") */
    protected $payments;




    public function __construct()
    {
        $this->initTrackCreate();
    }

    
    public function toData()
    {
        $data = new \stdClass();
        $this->dataHasGeneratedID($data);
        $this->dataTrackCreate($data);
        return $data;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getPayments()
    {
        return $this->payments;
    }

    public function getTotalPayments()
    {
        $total = 0;

        foreach ($this->payments as $p) {
            $total = $total + $p->getAmount();
        }

        return $total;
    }
    

    public function setTransactionMode($transaction_mode)
    {
        $this->transaction_mode = $transaction_mode;

        return $this;
    }

    public function getTransactionMode()
    {
        return $this->transaction_mode;
    }

    /**
     * Set transactionTotal
     *
     * @param string $transactionTotal
     *
     * @return POSTransactions
     */
    public function setTransactionTotal($transactionTotal)
    {
        $this->transaction_total = $transactionTotal;

        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get transactionTotal
     *
     * @return string
     */
    public function getTransactionTotal()
    {
        return $this->transaction_total;
    }

    /**
     * Set trnasactionBalance
     *
     * @param string $trnasactionBalance
     *
     * @return POSTransactions
     */
    public function setTrnasactionBalance($trnasactionBalance)
    {
        $this->trnasaction_balance = $trnasactionBalance;

        return $this;
    }

    /**
     * Get trnasactionBalance
     *
     * @return string
     */
    public function getTrnasactionBalance()
    {
        return $this->trnasaction_balance;
    }

    /**
     * Set customerId
     *
     * @param string $customerId
     *
     * @return POSTransactions
     */
    public function setCustomerId($customerId)
    {
        $this->customer_id = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return POSTransactions
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

    /**
     * Set transId
     *
     * @param string $transId
     *
     * @return POSTransaction
     */
    public function setTransId($transId)
    {
        $this->trans_id = $transId;

        return $this;
    }

    /**
     * Get transId
     *
     * @return string
     */
    public function getTransId()
    {
        return $this->trans_id;
    }

    /**
     * Set transDisplayId
     *
     * @param string $transDisplayId
     *
     * @return POSTransaction
     */
    public function setTransDisplayId($transDisplayId)
    {
        $this->trans_display_id = $transDisplayId;

        return $this;
    }

    /**
     * Get transDisplayId
     *
     * @return string
     */
    public function getTransDisplayId()
    {
        return $this->trans_display_id;
    }

    /**
     * Set transactionType
     *
     * @param string $transactionType
     *
     * @return POSTransaction
     */
    public function setTransactionType($transactionType)
    {
        $this->transaction_type = $transactionType;

        return $this;
    }

    /**
     * Get transactionType
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * Set syncedToErp
     *
     * @param string $syncedToErp
     *
     * @return POSTransaction
     */
    public function setSyncedToErp($syncedToErp)
    {
        $this->synced_to_erp = $syncedToErp;

        return $this;
    }

    /**
     * Get syncedToErp
     *
     * @return string
     */
    public function getSyncedToErp()
    {
        return $this->synced_to_erp;
    }

    /**
     * Set transactionBalance
     *
     * @param string $transactionBalance
     *
     * @return POSTransaction
     */
    public function setTransactionBalance($transactionBalance)
    {
        $this->transaction_balance = $transactionBalance;

        return $this;
    }

    /**
     * Get transactionBalance
     *
     * @return string
     */
    public function getTransactionBalance()
    {
        return $this->transaction_balance;
    }

    /**
     * Set taxRate
     *
     * @param string $taxRate
     *
     * @return POSTransaction
     */
    public function setTaxRate($taxRate)
    {
        $this->tax_rate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return string
     */
    public function getTaxRate()
    {
        return $this->tax_rate;
    }

    /**
     * Set origVatAmt
     *
     * @param string $origVatAmt
     *
     * @return POSTransaction
     */
    public function setOrigVatAmt($origVatAmt)
    {
        $this->orig_vat_amt = $origVatAmt;

        return $this;
    }

    /**
     * Get origVatAmt
     *
     * @return string
     */
    public function getOrigVatAmt()
    {
        return $this->orig_vat_amt;
    }

    /**
     * Set newVatAmt
     *
     * @param string $newVatAmt
     *
     * @return POSTransaction
     */
    public function setNewVatAmt($newVatAmt)
    {
        $this->new_vat_amt = $newVatAmt;

        return $this;
    }

    /**
     * Get newVatAmt
     *
     * @return string
     */
    public function getNewVatAmt()
    {
        return $this->new_vat_amt;
    }

    /**
     * Set origAmtNetVat
     *
     * @param string $origAmtNetVat
     *
     * @return POSTransaction
     */
    public function setOrigAmtNetVat($origAmtNetVat)
    {
        $this->orig_amt_net_vat = $origAmtNetVat;

        return $this;
    }

    /**
     * Get origAmtNetVat
     *
     * @return string
     */
    public function getOrigAmtNetVat()
    {
        return $this->orig_amt_net_vat;
    }

    /**
     * Set newAmtNetVat
     *
     * @param string $newAmtNetVat
     *
     * @return POSTransaction
     */
    public function setNewAmtNetVat($newAmtNetVat)
    {
        $this->new_amt_net_vat = $newAmtNetVat;

        return $this;
    }

    /**
     * Get newAmtNetVat
     *
     * @return string
     */
    public function getNewAmtNetVat()
    {
        return $this->new_amt_net_vat;
    }

    /**
     * Set taxCoverage
     *
     * @param string $taxCoverage
     *
     * @return POSTransaction
     */
    public function setTaxCoverage($taxCoverage)
    {
        $this->tax_coverage = $taxCoverage;

        return $this;
    }

    /**
     * Get taxCoverage
     *
     * @return string
     */
    public function getTaxCoverage()
    {
        return $this->tax_coverage;
    }

    /**
     * Set cartMin
     *
     * @param string $cartMin
     *
     * @return POSTransaction
     */
    public function setCartMin($cartMin)
    {
        $this->cart_min = $cartMin;

        return $this;
    }

    /**
     * Get cartMin
     *
     * @return string
     */
    public function getCartMin()
    {
        return $this->cart_min;
    }

    /**
     * Set cartOrigTotal
     *
     * @param string $cartOrigTotal
     *
     * @return POSTransaction
     */
    public function setCartOrigTotal($cartOrigTotal)
    {
        $this->cart_orig_total = $cartOrigTotal;

        return $this;
    }

    /**
     * Get cartOrigTotal
     *
     * @return string
     */
    public function getCartOrigTotal()
    {
        return $this->cart_orig_total;
    }

    /**
     * Set cartNewTotal
     *
     * @param string $cartNewTotal
     *
     * @return POSTransaction
     */
    public function setCartNewTotal($cartNewTotal)
    {
        $this->cart_new_total = $cartNewTotal;

        return $this;
    }

    /**
     * Get cartNewTotal
     *
     * @return string
     */
    public function getCartNewTotal()
    {
        return $this->cart_new_total;
    }

    /**
     * Set bulkDiscountType
     *
     * @param string $bulkDiscountType
     *
     * @return POSTransaction
     */
    public function setBulkDiscountType($bulkDiscountType)
    {
        $this->bulk_discount_type = $bulkDiscountType;

        return $this;
    }

    /**
     * Get bulkDiscountType
     *
     * @return string
     */
    public function getBulkDiscountType()
    {
        return $this->bulk_discount_type;
    }
}
