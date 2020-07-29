<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Change\Password;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : change.password.user
 * ---
 * Name : change.password.user
 * ---
 * Info :
 * A model to configure users in the change password wizard.
 */
final class User extends Base
{
    /**
     * Wizard
     * ---
     * Relation : many2one (change.password.wizard)
     * @see \Flux\OdooApiClient\Model\Object\Change\Password\Wizard
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $wizard_id;

    /**
     * User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * User Login
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $user_login;

    /**
     * New Password
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $new_passwd;

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
     * @param OdooRelation $wizard_id Wizard
     *        ---
     *        Relation : many2one (change.password.wizard)
     *        @see \Flux\OdooApiClient\Model\Object\Change\Password\Wizard
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_id User
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $wizard_id, OdooRelation $user_id)
    {
        $this->wizard_id = $wizard_id;
        $this->user_id = $user_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("wizard_id")
     */
    public function getWizardId(): OdooRelation
    {
        return $this->wizard_id;
    }

    /**
     * @param string|null $new_passwd
     */
    public function setNewPasswd(?string $new_passwd): void
    {
        $this->new_passwd = $new_passwd;
    }

    /**
     * @return string|null
     *
     * @SerializedName("new_passwd")
     */
    public function getNewPasswd(): ?string
    {
        return $this->new_passwd;
    }

    /**
     * @param string|null $user_login
     */
    public function setUserLogin(?string $user_login): void
    {
        $this->user_login = $user_login;
    }

    /**
     * @return string|null
     *
     * @SerializedName("user_login")
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation $wizard_id
     */
    public function setWizardId(OdooRelation $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'change.password.user';
    }
}
