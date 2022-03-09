<?php

namespace App\Format;

class ItemFormat{
    public static function isAvailable($data){
        if($data == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function formatItemList($item){
        return[
            'item_id' => $item->id,
            'category_id' => $item->category_id,
            'brand_id' => $item->brand_id,
            'unit_id' => $item->unit_id,
            'supplier_id' => $item->supplier_id,
            'category' => $item->category->name,
            'brand' => $item->brand->name,
            'unit' => $item->unit->name,
            'supplier' => $item->supplier->name,
            'section' => $item->section,
            'name' => $item->name,
            'slug' => $item->slug,
            'sku' => $item->sku,
            'cost' => $item->cost,
            'price' => $item->price,
            'discount' => $item->discount,
            'inventory' => $item->inventory,
            'expire_date' => $item->expire_date,
            'available' => self::isAvailable($item->available),
            'image' => $item->image,
            'description' => $item->description,
            'additional_info' => $item->additional_info,
            'created_at'=>$item->created_at->diffForHumans(),
            'updated_at'=>$item->updated_at->diffForHumans()
        ];
    }
}