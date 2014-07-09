<?php
/**
 * 用户个人中心
 * User: szq
 * Date: 14-7-7
 * Time: 上午9:03
 */
namespace Admin\Controller;

use Admin\Controller\BaseController;
use Admin\Entity\ShopncMessage;
use Admin\Entity\ShopncWorker;
use Admin\Filter\ChangePasswordFilter;
use Admin\Filter\SettingInformationFilter;
use Admin\Form\ChangePasswordForm;
use Admin\Form\SettingInformationForm;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Zend\View\Helper\ViewModel;

class PersonalController extends BaseController
{
    /*
     * 个人信息
     * */
    public function personalMessageListAction()
    {
        $userId = 1;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT ShopncMessage FROM Admin\Entity\ShopncMessage".
            "WHERE msgTo=1".
            "ORDER BY insert_time DESC";
        $query = $entityManager->createQuery($dql)
            ->setFirstResult(0)
            ->setMaxResults(1);
        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $bugs = $query->getArrayResult();
        echo '<pre>';
        var_dump($bugs);
        exit;
        return array('shopncMessageList'=>$shopncMessageList);

    }

    /*
     * 设置个人信息
     * */
    public function personalSettingInformationAction()
    {
        $conditions = array(
            'workerId' => $_SESSION['worker_id'] = 1,
        );
        $workerList = $this->selectModel($conditions);
        $form = new SettingInformationForm('', $workerList);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new SettingInformationFilter();
            $form->setInputFilter($inputFilter);

            $form->setData($post);

            if (!$form->isValid()) {
                $viewModel = new ViewModel(array('error' => true, 'form' => $form));
                $viewModel->setTemplate('admin/personal/personal-setting-information');
                return $viewModel;
            } else {
                $form->bindValues();
                $this->getEntityManager()->flush();
            }

        }
        return array('form' => $form);
    }

    /*
     * @var Doctrine\ORM\EntityManager
     * */
    public function personalChangePasswordAction()
    {
        $form = new ChangePasswordForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new ChangePasswordFilter();
            $form->setInputFilter($inputFilter);
            $form->setData($post);

            if (!$form->isValid()) {
                $viewModel = new ViewModel(array('error' => true, 'form' => $form));
                $viewModel->setTemplate('admin/personal/personal-change-password');
                return $viewModel;
            }

            if ($form->isValid()) {
                $shopncWorker = new ShopncWorker();
                $oldPassword = $post->old_password;
                $newPassword = $post->new_password;
                $confirmassword = $post->confirm_password;

                $option = array(
                    'old_password' => $oldPassword,
                    'new_password' => $newPassword,
                    'confirm_password' => $confirmassword,
                );
                $oldResult = $this->ajaxAction('oldPasswordExamination', $option);
                $newResult = $this->ajaxAction('newPasswordExamination', $option);
                if ($oldResult and $newResult) {
                    $entity = $this->getEntityManager()->getRepository('Admin\Entity\ShopncWorker')->findOneBy(array('workerId' => 1));
                    $entity->setworkerPwd(md5($newPassword));
                    $this->getEntityManager()->flush();
                    return $this->redirect()->toRoute('admin_personalcenter', array('action' => 'personalSettingInformation'));
                } else {
                    return $this->redirect()->toRoute('admin_personalcenter', array('action' => 'personalChangePassword'));
                }
            }

        }
        return array('form' => $form);
    }

    /*
     * 审查密码
     * */
    public function ajaxAction($map, $option)
    {
        switch ($map) {
            case 'oldPasswordExamination':
                $result = $this->oldPasswordExamination($option);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'newPasswordExamination':
                $result = $this->newPasswordExamination($option);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
                break;
        }
    }

    /*
     * 旧密码是否输入正确
     * */
    public function oldPasswordExamination($option)
    {
        if (is_array($option) and !empty($option['old_password'])) {
            $oldPassword = $option['old_password'];
            $conditions = array(
                'workerId' => $_SESSION['worker_id'] = 1,
            );
            $workerList = $this->selectModel($conditions);
            if (md5($oldPassword) == $workerList['workerPwd']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * 新密码和确认密码是否相同
     * */
    private function newPasswordExamination($option)
    {
        if ($option['new_password'] == $option['confirm_password']) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * 查询
     * */
    private function selectModel($option)
    {
        $list = $this->getEntityManager()->getRepository('Admin\Entity\ShopncWorker')->findOneBy($option);
        $list = $list->getArrayCopy();
        return $list;
    }
}
