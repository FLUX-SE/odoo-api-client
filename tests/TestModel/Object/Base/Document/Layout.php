<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Base\Document;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : base.document.layout
 * ---
 * Name : base.document.layout
 * ---
 * Info :
 * Customise the company document layout and display a live preview
 */
final class Layout extends Base
{
    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Company Logo
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $logo;

    /**
     * Preview logo
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $preview_logo;

    /**
     * Company Tagline
     * ---
     * Appears by default on the top right corner of your printed documents (report header).
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_header;

    /**
     * Report Footer
     * ---
     * Footer text displayed at the bottom of all reports.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_footer;

    /**
     * Paper format
     * ---
     * Relation : many2one (report.paperformat)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Report\Paperformat
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Document Template
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $external_report_layout_id;

    /**
     * Font
     * ---
     * Selection :
     *     -> Lato (Lato)
     *     -> Roboto (Roboto)
     *     -> Open_Sans (Open Sans)
     *     -> Montserrat (Montserrat)
     *     -> Oswald (Oswald)
     *     -> Raleway (Raleway)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $font;

    /**
     * Primary Color
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $primary_color;

    /**
     * Secondary Color
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $secondary_color;

    /**
     * Custom Colors
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $custom_colors;

    /**
     * Logo Primary Color
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $logo_primary_color;

    /**
     * Logo Secondary Color
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $logo_secondary_color;

    /**
     * Report Layout
     * ---
     * Relation : many2one (report.layout)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Report\Layout
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_layout_id;

    /**
     * Preview
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $preview;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Phone
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $phone;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $email;

    /**
     * Website Link
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $website;

    /**
     * Tax ID
     * ---
     * The Tax Identification Number. Complete it if the contact is subjected to government taxes. Used in some legal
     * statements.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $vat;

    /**
     * Company Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $vat
     */
    public function setVat(?string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @param string|null $preview
     */
    public function setPreview(?string $preview): void
    {
        $this->preview = $preview;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email")
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("website")
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     *
     * @SerializedName("vat")
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $report_layout_id
     */
    public function setReportLayoutId(?OdooRelation $report_layout_id): void
    {
        $this->report_layout_id = $report_layout_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
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
     * @return string|null
     *
     * @SerializedName("preview")
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_layout_id")
     */
    public function getReportLayoutId(): ?OdooRelation
    {
        return $this->report_layout_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("external_report_layout_id")
     */
    public function getExternalReportLayoutId(): ?OdooRelation
    {
        return $this->external_report_layout_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("logo")
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed|null $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("preview_logo")
     */
    public function getPreviewLogo()
    {
        return $this->preview_logo;
    }

    /**
     * @param mixed|null $preview_logo
     */
    public function setPreviewLogo($preview_logo): void
    {
        $this->preview_logo = $preview_logo;
    }

    /**
     * @return string|null
     *
     * @SerializedName("report_header")
     */
    public function getReportHeader(): ?string
    {
        return $this->report_header;
    }

    /**
     * @param string|null $report_header
     */
    public function setReportHeader(?string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @return string|null
     *
     * @SerializedName("report_footer")
     */
    public function getReportFooter(): ?string
    {
        return $this->report_footer;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("paperformat_id")
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
    }

    /**
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param string|null $logo_secondary_color
     */
    public function setLogoSecondaryColor(?string $logo_secondary_color): void
    {
        $this->logo_secondary_color = $logo_secondary_color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("font")
     */
    public function getFont(): ?string
    {
        return $this->font;
    }

    /**
     * @param string|null $font
     */
    public function setFont(?string $font): void
    {
        $this->font = $font;
    }

    /**
     * @return string|null
     *
     * @SerializedName("primary_color")
     */
    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    /**
     * @param string|null $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("secondary_color")
     */
    public function getSecondaryColor(): ?string
    {
        return $this->secondary_color;
    }

    /**
     * @param string|null $secondary_color
     */
    public function setSecondaryColor(?string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("custom_colors")
     */
    public function isCustomColors(): ?bool
    {
        return $this->custom_colors;
    }

    /**
     * @param bool|null $custom_colors
     */
    public function setCustomColors(?bool $custom_colors): void
    {
        $this->custom_colors = $custom_colors;
    }

    /**
     * @return string|null
     *
     * @SerializedName("logo_primary_color")
     */
    public function getLogoPrimaryColor(): ?string
    {
        return $this->logo_primary_color;
    }

    /**
     * @param string|null $logo_primary_color
     */
    public function setLogoPrimaryColor(?string $logo_primary_color): void
    {
        $this->logo_primary_color = $logo_primary_color;
    }

    /**
     * @return string|null
     *
     * @SerializedName("logo_secondary_color")
     */
    public function getLogoSecondaryColor(): ?string
    {
        return $this->logo_secondary_color;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.document.layout';
    }
}
