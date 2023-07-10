
export interface ApiErrorResponse {
  "hydra:title"?: string;
  "hydra:description"?: string
  violations?: Array<{code:string, message:string, propertyPath: string}>
  message?:{code: number, message: string};
}
