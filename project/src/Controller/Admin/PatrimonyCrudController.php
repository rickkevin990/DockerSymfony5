<?php

namespace App\Controller\Admin;

use App\Entity\Patrimony;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PatrimonyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Patrimony::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('label'),
            AssociationField::new('services'),
            TextField::new('type'),
            TextField::new('bailleur'),
            TextEditorField::new('descripption'),

        ];
    }

}
