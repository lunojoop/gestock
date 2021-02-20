<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['POST', 'DELET'])
            && $subject instanceof User;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        //dd($subject->getRole()->getLibelle());
        if (!$user instanceof UserInterface) {
            return false;
        }
        /*if ($user->getRoles() [0] === 'ROLE_SUP_ADMIN'){
            return true;
        }
        if ($user->getRoles() [0] === 'ROLE_ADMIN' || $user->getRoles() [0] === 'ROLE_USER'){
            return false;
        }*/
        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'POST':
                return $user->getRoles()[0] === 'ROLE_ADMIN' && $subject->getRole()->getLibelle()==='USER';
                break;
            case 'DELET':
                // logic to determine if the user can VIEW
                // return true or false
                break;
        }

        return false;
    }
}
