import {Category} from"../models/Category";
export interface ApiCategoryResponse {
  "hydra:totalItems": number;
  "hydra:member": Category[]
}
