<?php
/**
 * Implements features from WebUser (yii-user)
 * https://github.com/mishamx/yii-user
 *
 * eg. for RWebUser from yii-rights
 */
class WebUserBehavior extends CBehavior
{
    public function getRole()
    {
        return $this->owner->getState('__role');
    }

    public function getId()
    {
        return $this->owner->getState('__id') ? $this->owner->getState('__id') : 0;
    }

    protected function afterLogin($fromCookie)
    {
        parent::afterLogin($fromCookie);
        $this->updateSession();
    }

    public function updateSession()
    {
        $user              = Yii::app()->getModule('user')->user($this->id);

        if ($user == false) return; // TODO?

        $this->owner->name = $user->username;
        $userAttributes    = CMap::mergeArray(array(
                                                   'email'        => $user->email,
                                                   'username'     => $user->username,
                                                   'create_at'    => $user->create_at,
                                                   'lastvisit_at' => $user->lastvisit_at,
                                              ), $user->profile->getAttributes());
        foreach ($userAttributes as $attrName => $attrValue) {
            $this->owner->setState($attrName, $attrValue);
        }
    }

    public function model($id = 0)
    {
        return Yii::app()->getModule('user')->user($id);
    }

    public function user($id = 0)
    {
        return $this->owner->model($id);
    }

    public function getUserByName($username)
    {
        return Yii::app()->getModule('user')->getUserByName($username);
    }

    public function getAdmins()
    {
        return Yii::app()->getModule('user')->getAdmins();
    }

    public function isAdmin()
    {
        return Yii::app()->getModule('user')->isAdmin();
    }
}
