<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tour\Upload;

use Flux\OdooApiClient\Model\Object\Mail\Compose\Message;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.tour.upload.bill
 * ---
 * Name : account.tour.upload.bill
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Bill extends Message
{
    /**
     * Composer
     * ---
     * Relation : many2one (mail.compose.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Compose\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $composer_id;

    /**
     * Selection
     * ---
     * Selection :
     *     -> sample (Try a sample vendor bill)
     *     -> upload (Upload your own bill)
     *     -> email (Or send a bill to False@fluxse.odoo.com)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $selection;

    /**
     * Sample Bill Preview
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $sample_bill_preview;

    /**
     * @param OdooRelation $composer_id Composer
     *        ---
     *        Relation : many2one (mail.compose.message)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Compose\Message
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $message_type Type
     *        ---
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     *        ---
     *        Selection :
     *            -> comment (Comment)
     *            -> notification (System notification)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $composer_id, string $message_type)
    {
        $this->composer_id = $composer_id;
        parent::__construct($message_type);
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("composer_id")
     */
    public function getComposerId(): OdooRelation
    {
        return $this->composer_id;
    }

    /**
     * @param OdooRelation $composer_id
     */
    public function setComposerId(OdooRelation $composer_id): void
    {
        $this->composer_id = $composer_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("selection")
     */
    public function getSelection(): ?string
    {
        return $this->selection;
    }

    /**
     * @param string|null $selection
     */
    public function setSelection(?string $selection): void
    {
        $this->selection = $selection;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("sample_bill_preview")
     */
    public function getSampleBillPreview()
    {
        return $this->sample_bill_preview;
    }

    /**
     * @param mixed|null $sample_bill_preview
     */
    public function setSampleBillPreview($sample_bill_preview): void
    {
        $this->sample_bill_preview = $sample_bill_preview;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tour.upload.bill';
    }
}
