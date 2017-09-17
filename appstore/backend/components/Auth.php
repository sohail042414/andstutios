<?php

namespace app\components;

use common\models\Permission;
use common\models\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Manages permissions for user. 
 * 
 * @author sohailmaroof
 */
class Auth extends \yii\base\Component {

    private $view = array();
    private $create = array();
    private $update = array();
    private $delete = array();
    private $user = NULL;
    private $safe = array('admin', 'developer');

    public function init() {
        $this->setUser();
        $this->setPermissions();
    }

    private function setUser() {
        if (!\Yii::$app->user->isGuest) {
            $this->user = User::findIdentity(\Yii::$app->user->getId());
        }
    }

    private function setPermissions() {
        if ($this->user != NULL) {

            $data = Permission::find()->where(['role' => $this->user])->all();

            foreach ($data as $permission) {
                if ($permission->view) {
                    $this->view[] = $permission->resource_id;
                }

                if ($permission->create) {
                    $this->create[] = $permission->resource_id;
                }

                if ($permission->update) {
                    $this->update[] = $permission->resource_id;
                }

                if ($permission->delete) {
                    $this->delete[] = $permission->resource_id;
                }
            }
        }
    }

    public function canView($resource_id) {

        if ($this->user != NULL) {

            if (in_array($this->user->role, $this->safe)) {
                return TRUE;
            }

            if (in_array($resource_id, $this->view)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function canCreate($resource_id) {

        if ($this->user != NULL) {

            if (in_array($this->user->role, $this->safe)) {
                return TRUE;
            }

            if (in_array($resource_id, $this->create)) {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function canUpdate($resource_id) {

        if ($this->user != NULL) {

            if (in_array($this->user->role, $this->safe)) {
                return TRUE;
            }

            if (in_array($resource_id, $this->update)) {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function canDelete($resource_id) {

        if ($this->user != NULL) {

            if (in_array($this->user->role, $this->safe)) {
                return TRUE;
            }

            if (in_array($resource_id, $this->delete)) {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function getPermissions() {

        return array(
            'view' => $this->view,
            'create' => $this->create,
            'update' => $this->update,
            'delete' => $this->delete,
        );
    }

}
