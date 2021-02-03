<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Expense\Extract;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.expense.extract.words
 * ---
 * Name : hr.expense.extract.words
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Words extends Base
{
    /**
     * Expense
     * ---
     * expense id
     * ---
     * Relation : many2one (hr.expense)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Expense
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $expense_id;

    /**
     * Word Text
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $word_text;

    /**
     * Word Page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $word_page;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("expense_id")
     */
    public function getExpenseId(): ?OdooRelation
    {
        return $this->expense_id;
    }

    /**
     * @param OdooRelation|null $expense_id
     */
    public function setExpenseId(?OdooRelation $expense_id): void
    {
        $this->expense_id = $expense_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("word_text")
     */
    public function getWordText(): ?string
    {
        return $this->word_text;
    }

    /**
     * @param string|null $word_text
     */
    public function setWordText(?string $word_text): void
    {
        $this->word_text = $word_text;
    }

    /**
     * @return int|null
     *
     * @SerializedName("word_page")
     */
    public function getWordPage(): ?int
    {
        return $this->word_page;
    }

    /**
     * @param int|null $word_page
     */
    public function setWordPage(?int $word_page): void
    {
        $this->word_page = $word_page;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.expense.extract.words';
    }
}
