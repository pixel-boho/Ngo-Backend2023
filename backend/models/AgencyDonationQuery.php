<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[AgencyDonation]].
 *
 * @see AgencyDonation
 */
class AgencyDonationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AgencyDonation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AgencyDonation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
