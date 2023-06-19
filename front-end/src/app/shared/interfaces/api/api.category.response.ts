import {Category} from"../models/category";
export interface ApiCategoryResponse {
  "hydra:totalItems": number;
  "hydra:member": Category[]
}
export interface ApiCategoryResponse {
  data: {
    categories: Category[];
  };
}
